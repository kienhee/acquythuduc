
@extends('layouts.admin.index')
@section('title', 'Thêm bài viết mới')
@section('content')

    <x-breadcrumb parentName="Bài viết" parentLink="dashboard.post.index" childrenName="Thêm bài viết mới" />
    <form action="{{ route('dashboard.post.add') }}" method="POST" class="col-xl" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <x-alert />
            <x-header-table tableName="Thêm bài viết mới" link="dashboard.post.index" linkName="Tất cả bài viết" />
            <div class="card-body">

                <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                    <img src="{{ asset('images/image-preview.png') }}" alt="Cover"
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
                        <label class="form-label" for="title">Tiêu đề:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            oninput="createSlug('title','url-slug')" />
                        @error('title')
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


                    <div class="mb-3">
                        <div class="d-flex justify-content-between"> <label class="form-label "
                                for="description">Mô tả:<span class="text-danger">*</span>
                            </label>
                            <p class="mb-0">(<span id="quantity__char">0</span>/255)</p>
                        </div>

                        <textarea id="description" oninput="checkChar('description','quantity__char')" class="form-control" name="description"
                            placeholder="Khoảng 255 ký tự">{{ old('description') }}</textarea>

                        @error('description')
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
                        <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        <button type="submit" class="btn btn-outline-primary">Tạo bài viết</button>
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
