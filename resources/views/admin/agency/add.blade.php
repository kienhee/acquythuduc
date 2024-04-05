@extends('layouts.admin.index')
@section('title', 'Thêm Đại Lý Mới')
@section('content')

    <x-breadcrumb parentName="Đại Lý" parentLink="dashboard.agency.index" childrenName="Thêm Đại Lý Mới" />
    <form action="{{ route('dashboard.agency.add') }}" method="POST" class="col-xl" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <x-alert />
            <x-header-table tableName="Thêm Đại Lý Mới" link="dashboard.agency.index" linkName="Tất Cả Đại Lý" />
            <div class="card-body">
                <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                    <img src="{{ asset('images/image-preview.png') }}" alt="Bìa"
                        class="d-none rounded cover-img-post img-fluid " id="uploadedAvatar" />
                    <div class="button-wrapper text-center">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải ảnh bìa</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden name="cover"
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>
                    @error('cover')
                        <p class="text-danger my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="name">Tên:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phone">Điện Thoại:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" />
                        </div>
                        @error('phone')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">Địa Chỉ:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <textarea name="address" id="address" class="form-control" rows="10">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary">Làm Mới</button>
                        <button type="submit" class="btn btn-outline-primary">Tạo Đại Lý</button>
                    </div>

                </div>
            </div>
    </form>
    <script>
        let imgInp = document.getElementById('upload');
        let preview = document.getElementById('uploadedAvatar');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
                preview.classList.remove("d-none")
                preview.classList.add("d-block")
            }
        }
    </script>
@endsection
