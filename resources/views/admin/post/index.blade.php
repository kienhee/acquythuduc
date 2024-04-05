@extends('layouts.admin.index')
@section('title', 'Posts')

@section('content')
    <x-breadcrumb parentName="Bài viết" parentLink="dashboard.post.index" childrenName="Tất cả bài viết" />
    <div class="card">
        <x-alert />

        <x-header-table tableName="Tất cả bài viết ({{ $totalPost }})" link="dashboard.post.add"
            linkName="Thêm bài viết mới" />

        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Tìm kiếm tiêu đề bài viết" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Trạng thái</option>
                        <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ Request()->status == 'inactive' ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Sắp xếp</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>


                <div class="col-md-6 col-lg-3 mb-2 text-md-end">
                    <a href="{{ route('dashboard.post.index') }}" class="btn btn-outline-secondary">Đặt lại </a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>

            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="px-1 text-center" style="width: 50px">#ID</th>
                        <th class="px-1 text-center" style="width: 50px"></th>
                        <th>Tiêu đề</th>
                        <th class="px-1 text-center" style="width: 130px">Trạng thái</th>
                        <th style="width: 130px">Ngày tạo</th>
                        <th class="px-1 text-center" style="width: 130px">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $item)
                            <tr>
                                <td class="px-0 text-center">
                                    <a href="{{ route('dashboard.post.edit', $item->id) }}" title="Click Read more"
                                        style="color: inherit"><strong>{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td class="px-0 text-center">
                                    <img src="{{ $item->cover }}" alt="Image"
                                        class=" object-fit-cover border rounded w-px-40 h-px-40" style="object-fit: cover">
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.post.edit', $item->id) }}" style="color: inherit    "
                                        title="Click Read more" class="d-block">
                                        <strong>
                                            {{ $item->title }}
                                        </strong>
                                    </a>
                                    {{-- <small>Category: {{ $item->category->name ?? 'Hidden category' }}</small> --}}
                                </td>
                                <td class="px-0 text-center"><span
                                        class="badge  me-1 {{ $item->deleted_at == null ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->deleted_at == null ? 'Active' : 'Hidden' }}</span>
                                </td>


                                <td>
                                    <p class="m-0">{{ $item->created_at->format('d/m/Y') }}</p>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>


                                <td class="px-0 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.post.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Đọc thêm</a>

                                            @if ($item->trashed() == 1)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.post.restore', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i class='bx bx-revision'></i>
                                                        Kích hoạt bài viết
                                                    </button>
                                                </form>
                                            @endif
                                            <form class="dropdown-item"
                                                action="{{ $item->trashed() ? route('dashboard.post.force-delete', $item->id) : route('dashboard.post.soft-delete', $item->id) }}"
                                                method="POST"
                                                @if ($item->trashed()) onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn không?')" @endif>
                                                @csrf
                                                @method('delete')
                                                <button class="btn p-0  w-100 text-start" type="submit">
                                                    <i
                                                        class="bx {{ $item->trashed() ? 'bx-trash' : 'bx bxs-hand' }}  me-1"></i>
                                                    {{ $item->trashed() ? 'Đã xóa vĩnh viễn' : 'Ẩn bài viết' }}
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
