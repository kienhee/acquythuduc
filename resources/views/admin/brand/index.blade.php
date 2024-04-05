@extends('layouts.admin.index')
@section('title', 'Partners')

@section('content')
    <x-breadcrumb parentName="Partners" parentLink="dashboard.brand.index" childrenName="All Partners" />
    <div class="card">
        <x-alert />

        @can('create', App\Models\Brand::class)
            <x-header-table tableName="All Partners" link="dashboard.brand.add" linkName="Add New Partner" />
        @else
            <div class="mx-3">
                <h5 class="card-header px-0">All Partners</h5>
            </div>
            <hr class="my-0" />
        @endcan
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="px-1 text-center" style="width: 50px">#ID</th>
                        <th class="px-1 text-center" style="width: 50px"></th>
                        <th>Name</th>
                        <th style="width: 50px">Created Date</th>
                        <th class="px-1 text-center" style="width: 130px">Settings</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($brands->count() > 0)
                        @foreach ($brands as $item)
                            <tr>
                                <td class="px-0 text-center">
                                    <a href="{{ route('dashboard.brand.edit', $item->id) }}" title="Click Read more"
                                        style="color: inherit"><strong>{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td class="px-0 text-center">
                                    <img src="{{ $item->logo }}" alt="Image"
                                        class=" object-fit-cover border rounded w-px-40 h-px-40" style="object-fit: cover">
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.brand.edit', $item->id) }}" style="color: inherit    "
                                        title="Click Read more" class="d-block">
                                        <strong>
                                            {{ $item->name }}
                                        </strong>
                                    </a>
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
                                            @can('update', App\Models\Brand::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.brand.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Edit Information</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Permission Denied</a>
                                            @endcan
                                            @can('delete', App\Models\Brand::class)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.brand.delete', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete permanently?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i class="bx bx-trash  me-1"></i>
                                                        Delete Permanently
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
                            <td colspan="9" class="text-center">No data available!</td>
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $brands->withQueryString()->links() }}
        </div>
    </div>
@endsection
