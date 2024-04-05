@extends('layouts.admin.index')
@section('title', 'Post Tags')

@section('content')
    <x-breadcrumb parentName="Post Tags" parentLink="dashboard.tag.index" childrenName="All Post Tags" />
    <div class="card">
        <x-alert />
        @can('create', App\Models\Tag::class)
            <x-header-table tableName="All Post Tags" link="dashboard.tag.add" linkName="Add New Tag" />
        @else
            <div class="mx-3">
                <h5 class="card-header px-0">All Post Tags</h5>
            </div>
            <hr class="my-0" />
        @endcan
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($tags->count() > 0)
                        @foreach ($tags as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger "></i> <a style="color: inherit"
                                        href="{{ route('dashboard.tag.edit', $item->id) }}"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>

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
                                            @can('update', App\Models\Tag::class)
                                                <a class="dropdown-item" href="{{ route('dashboard.tag.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Edit Information</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Permission Denied</a>
                                            @endcan

                                            @can('delete', App\Models\Tag::class)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.tag.delete', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to permanently delete?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i class="bx bx-trash  me-1"></i>
                                                        Permanently Delete
                                                    </button>
                                                </form>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-trash me-1"></i>Permission Denied</a>
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
