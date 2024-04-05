@extends('layouts.admin.index')
@section('title', 'Add New Province')

@section('content')
    <x-breadcrumb parentName="Post Provinces" parentLink="dashboard.province.index" childrenName="Add New Province" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Add New Province" link="dashboard.province.index" linkName="All Provinces" />
                <div class="card-body">
                    <form action="{{ route('dashboard.province.store') }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text"
                                    id="name" name="name" value="{{ old('name') }}" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Add New Province</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
