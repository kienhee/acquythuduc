@php
    $moduleName = 'contact';
@endphp

@extends('layouts.admin.index')
@section('title', 'Management of ' . $moduleName)
@section('content')
    <x-breadcrumb parentName="Management of {{ $moduleName }}" parentLink="dashboard.contact.index"
        childrenName="All {{ $moduleName }}" />

    <div class="card">
        <x-alert />
        <div class="mx-3">
            <h5 class="card-header px-0">Contacts</h5>
        </div>
        <hr class="my-0" />
        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Category Name" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Filter</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Newest</option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2 text-md-end">
                    <a href="{{ route('dashboard.contact.index') }}" class="btn btn-outline-secondary me-2">Reset
                    </a>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="px-1 text-center" style="width: 50px">#ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($contacts->count() > 0)
                        @foreach ($contacts as $item)
                            <tr>
                                <td> <a href="{{ route('dashboard.contact.view', $item->id) }}" title="Click to view"
                                        style="color:inherit"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td><a href="{{ route('dashboard.contact.view', $item->id) }}" title="Click to view"
                                        style="color: inherit"><strong>{{ $item->full_name }}</strong>
                                    </a></td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td><span
                                        class="badge  me-1 {{ $item->isCheck == 1 ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->isCheck == 1 ? 'Answered' : 'Not Answered' }}</span>
                                </td>
                                <td>
                                    <p class="m-0">{{ $item->created_at->format('d M Y') }}</p>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            @can('update', App\Models\Contact::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.contact.view', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    View Details</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Not Allowed</a>
                                            @endcan
                                            @can('update', App\Models\Contact::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.contact.update', $item->id) }}"><i
                                                        class='bx bx-check'></i>
                                                    Answered</a>
                                            @endcan

                                            @can('delete', App\Models\Contact::class)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.contact.delete', $item->id) }}" method="POST"
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
                                                        class="bx bx-trash me-1"></i>
                                                    Not Allowed</a>
                                            @endcan

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No data available!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $contacts->withQueryString()->links() }}
        </div>
    </div>
@endsection
