@extends('layouts.admin.index')
@section('title', 'Thêm Sản phẩm Mới')
@section('content')

    <x-breadcrumb parentName="Sản phẩm" parentLink="dashboard.product.index" childrenName="Thêm Sản phẩm Mới" />
    <form action="{{ route('dashboard.product.add') }}" method="POST" class="col-xl" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <x-alert />
            <x-header-table tableName="Thêm Sản phẩm Mới" link="dashboard.product.index" linkName="Tất cả Sản phẩm" />
            <div class="card-body">

                <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                    <img src="{{ asset('images/image-preview.png') }}" alt="Ảnh bìa"
                        class="d-none rounded cover-img-post img-fluid " id="uploadedAvatar" />
                    <div class="button-wrapper text-center">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải Ảnh Bìa</span>
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
                        <label class="form-label" for="name">Tên sản phẩm:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            oninput="createSlug('name','url-slug')" />
                        @error('name')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="url-slug">URL:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="url-slug" name="slug"
                                value="{{ old('slug') }}" />
                        </div>
                        @error('slug')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="code">Mã sản phẩm:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" />
                        </div>
                        @error('code')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="status">Tình trạng hàng:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="status" name="status"
                                value="{{ old('status') }}" />
                        </div>
                        @error('status')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="producedBy">Hãng sản xuất:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="producedBy" name="producedBy"
                                value="{{ old('producedBy') }}" />
                        </div>
                        @error('producedBy')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="Origin">Xuất xứ:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="Origin" name="Origin"
                                value="{{ old('Origin') }}" />
                        </div>
                        @error('Origin')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="warranty">Bảo hành:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="warranty" name="warranty"
                                value="{{ old('warranty') }}" />
                        </div>
                        @error('warranty')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="size">Kích thước:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="size" name="size"
                                value="{{ old('size') }}" />
                        </div>
                        @error('size')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="categories_select" class="form-label">Danh mục:<span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="categories_select" name="category_id">
                            <option value="">Chọn một danh mục</option>
                            @foreach (getChildrenCategories() as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('category_id') == $item->id ? 'selected' : false }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label" for="content">Nội dung:<span class="text-danger">*</span></label>
                        <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-outline-primary">Tạo Sản phẩm</button>
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
