@extends('layouts.admin.index')
@section('title', ' Provinces')

@section('content')
    <x-breadcrumb parentName=" Provinces" parentLink="dashboard.province.index" childrenName="All  Provinces" />
    <div class="card">
        <x-alert />
        @can('create', App\Models\Province::class)
            <x-header-table tableName="All  Provinces" link="dashboard.province.add" linkName="Add New Province" />
        @else
            <div class="mx-3">
                <h5 class="card-header px-0">All Provinces</h5>
            </div>
            <hr class="my-0" />
        @endcan
        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Search name" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Status</option>
                        <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ Request()->status == 'inactive' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Sort</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Latest</option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-12 mb-2 text-md-end">
                    <a href="{{ route('dashboard.province.index') }}" class="btn btn-outline-secondary">Reset </a>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($provinces->count() > 0)
                        @foreach ($provinces as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger "></i> <a style="color: inherit"
                                        href="{{ route('dashboard.province.edit', $item->id) }}"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td><span
                                        class="badge  me-1 {{ $item->deleted_at == null ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->deleted_at == null ? 'Active' : 'Hidden' }}</span>
                                </td>
                                <td>
                                    <p class="m-0">{{ $item->created_at->format('M d, Y') }}</p>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('update', App\Models\Province::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.province.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Read more</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>Not allowed</a>
                                            @endcan
                                            @can('delete', App\Models\Province::class)
                                                @if ($item->trashed() == 1)
                                                    <form class="dropdown-item"
                                                        action="{{ route('dashboard.province.restore', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn p-0  w-100 text-start" type="submit">
                                                            <i class='bx bx-revision'></i>
                                                            Activate post
                                                        </button>
                                                    </form>
                                                @endif
                                                <form class="dropdown-item"
                                                    action="{{ $item->trashed() ? route('dashboard.province.force-delete', $item->id) : route('dashboard.province.soft-delete', $item->id) }}"
                                                    method="POST"
                                                    @if ($item->trashed()) onsubmit="return confirm('Are you sure you want to delete it permanently?')" @endif>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i
                                                            class="bx {{ $item->trashed() ? 'bx-trash' : 'bx bxs-hand' }}  me-1"></i>
                                                        {{ $item->trashed() ? 'Permanently deleted' : 'Hide post' }}
                                                    </button>
                                                </form>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-trash me-1"></i>Not allowed</a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No data available!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
