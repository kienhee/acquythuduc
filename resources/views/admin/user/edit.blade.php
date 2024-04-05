@php
    $moduleName = 'user';
@endphp

@extends('layouts.admin.index')
@section('title', 'Cập nhật ' . $moduleName)
@section('content')
    <x-breadcrumb parentName="Quản lý Người dùng" parentLink="dashboard.user.index"
        childrenName="Cập nhật {{ $moduleName }}" />
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('dashboard.user.update', $user->id) }}" enctype="multipart/form-data">
                <div class="card mb-4">
                    <x-alert />
                    <x-header-table tableName="Cập nhật {{ $moduleName }}" link="dashboard.user.index"
                        linkName="Danh sách {{ $moduleName }}" />

                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="full_name" class="form-label">Họ và tên đầy đủ: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="full_name" name="full_name"
                                    value="{{ $user->full_name }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">E-mail: </label>
                                <input class="form-control" type="text" disabled placeholder="john.doe@example.com"
                                    value="{{ $user->email }}" />
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label" for="phone">Số điện thoại: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="phone" name="phone"
                                    value="{{ $user->phone }}" />
                            </div>
                        </div>
                        @if (Auth::user()->id == $user->id)
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Cập nhật {{ $moduleName }}</button>
                                <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                            </div>
                        @endif


                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
