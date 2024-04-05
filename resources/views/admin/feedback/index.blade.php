@extends('layouts.admin.index')
@section('title', 'Feedbacks')
@section('content')

    <x-breadcrumb parentName="Feedbacks" parentLink="dashboard.feedback.index" childrenName="Tất Cả Feedbacks" />
    <div class="card">
        <x-alert />

        @can('create', App\Models\Feedback::class)
            <x-header-table tableName="Feedbacks" link="dashboard.feedback.add" linkName="Thêm Feedbacks mới" />
        @else
            <div class="mx-3">
                <h5 class="card-header px-0">Feedbacks</h5>
            </div>
            <hr class="my-0" />
        @endcan
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Ảnh Đại Diện</th>
                            <th>Tên</th>
                            {{-- <th>Nghề Nghiệp</th> --}}
                            <th>Feedbacks</th>
                            <th>Cài Đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td class="text-center">

                                    <a class="text-dark" title="Chi tiết"
                                        href="{{ route('dashboard.feedback.edit', $feedback->id) }}">
                                        {{ $feedback->id }}</a>
                                </td>
                                <td class="text-center">
                                    <img src="{{ $feedback->avatar ?? '/images/no-img.png' }}"
                                        style="width:80px;height:80px; object-fit:cover;border-radius:4px"
                                        alt="Ảnh Đại Diện">
                                </td>
                                <td> <a title="Xem Feedbacks" class="text-dark" target="_blank"><strong>
                                            {{ $feedback->name }}</strong></a></h3>
                                </td>
                                {{-- <td>
                                    {{ $feedback->career }}
                                </td> --}}
                                <td>
                                    {{ $feedback->feedback }}
                                </td>



                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('update', App\Models\Feedback::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.feedback.edit', $feedback->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Xem Thêm</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i> Not allowed.</a>
                                            @endcan
                                            @can('delete', App\Models\Feedback::class)
                                                <form class="dropdown-item" style="cursor: pointer"
                                                    action="{{ route('dashboard.feedback.delete', $feedback->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Bạn có chắc muốn xóa Feedbacks này không?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0" type="submit">
                                                        <i class="bx bx-trash me-1"></i><span>Xóa Feedbacks</span>
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
                    </tbody>
                </table>
                {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
@endsection
