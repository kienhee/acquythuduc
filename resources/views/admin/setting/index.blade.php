@extends('layouts.admin.index')
@section('title', 'Cài đặt')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a
                    href="{{ url()->current() == route('dashboard.index') ? 'javascript:void(0)' : route('dashboard.index') }}">
                    Tổng quan</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Hệ thống</a>
            </li>
            <li class="breadcrumb-item active">Cài đặt</li>
        </ol>
    </nav>

    <form action="{{ route('dashboard.setting.updateSetting') }}" method="POST" class="col-xl" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card mb-4">
            <x-alert />
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Cài đặt</h5>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="email">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email') ?? $setting->email }}">
                        @error('email')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="phone">Điện thoại<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone') ?? $setting->phone }}">
                        @error('phone')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="address">Địa chỉ<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address') ?? $setting->address }}">
                        @error('address')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Bản đồ<span class="text-danger">*</span></h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <textarea name="map" class="form-control" placeholder="Mã nhúng HTML của Bản đồ">{{ $setting->map }}</textarea>
                    @error('map')
                        <p class="text-danger my-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
    </form>


@endsection
