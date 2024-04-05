@php
    $moduleName = 'user';
@endphp

@extends('layouts.admin.index')
@section('title', 'Thông tin người dùng')
@section('content')
    <x-breadcrumb parentName="Thông tin người dùng" parentLink="dashboard.user.account-setting"
        childrenName="{{ Auth::user()->full_name }}" />
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('dashboard.user.account-setting-post', Auth::user()->id) }}"
                enctype="multipart/form-data">
                <div class="card mb-4">
                    @if (session('msgSuccess'))
                        <div class=" mt-3 mx-3 alert alert-success alert-dismissible" role="alert">
                            {{ session('msgSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('msgError'))
                        <div class="mt-3 mx-3  alert alert-danger alert-dismissible" role="alert">
                            {{ session('msgError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h5 class="card-header">Thông tin cá nhân</h5>
                    <!-- Account -->
                    <div class="card-body">

                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ Auth::user()->avatar ?? asset('images/avatar-default.png') }}" alt="user-avatar"
                                class="d-block rounded " style="object-fit:cover" height="100" width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Tải lên</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden name="avatar"
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>

                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="full_name" class="form-label">Họ và tên: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="full_name" name="full_name"
                                    value="{{ Auth::user()->full_name }}" />
                                @error('career')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">E-mail:</label>
                                <input class="form-control" type="text" disabled placeholder="john.doe@example.com"
                                    value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label" for="phone">Số điện thoại: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="phone" name="phone"
                                    value="{{ Auth::user()->phone }}" />
                                @error('phone')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </div>
            </form>
            <!-- /Account -->
        </div>
    </div>
    </div>
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
