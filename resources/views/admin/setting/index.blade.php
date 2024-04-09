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
            <hr>
           
                      <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Về chúng tôi<span class="text-danger">*</span></h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                     <div class="mb-5">
                        <textarea id="content" class="form-control" name="about" placeholder="Nội dung bài viết">{{ old('about') ?? $setting->about }}</textarea>
                        @error('about')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
           
                      <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Hình ảnh<span class="text-danger">*</span></h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                      <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                    <img src="{{ $setting->image }}" alt="Cover"
                        class="rounded cover-img-post img-fluid " id="uploadedAvatar" />
                    <div class="button-wrapper text-center">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải ảnh lên</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden name="image"
                                accept="image/png, image/jpeg" />
                            <input type="hidden" name="image" value="{{ $setting->image }}">
                        </label>
                    </div>
                    @error('image')
                        <p class="text-danger my-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
    </form>

<script>
        let imgInp = document.getElementById('upload');
        let preview = document.getElementById('uploadedAvatar');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
