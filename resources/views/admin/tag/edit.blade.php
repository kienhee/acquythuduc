@extends('layouts.admin.index')
@section('title', 'Update Tag')

@section('content')
    <x-breadcrumb parentName="Post Tags" parentLink="dashboard.tag.index" childrenName="Update Tag" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Update Tag" link="dashboard.tag.index" linkName="All Post Tags" />
                <div class="card-body">
                    <form action="{{ route('dashboard.tag.update', $tag->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row ">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text"
                                    id="name" name="name" value="{{ $tag->name ?? old('name') }}" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update Tag</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
