@extends('layouts.admin.index')
@section('title', 'Cập nhật bài viết')
@section('content')

    <x-breadcrumb parentName="Bài viết" parentLink="dashboard.post.index" childrenName="Cập nhật" />
    <form action="{{ route('dashboard.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card mb-4">
            <x-alert />
            <x-header-table tableName="Cập nhật bài viết" link="dashboard.post.index" linkName="Tất cả bài viết" />
            <div class="card-body">

                <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                    <img src="{{ $post->cover ?? asset('images/image-preview.png') }}" alt="Cover"
                        class="rounded cover-img-post img-fluid " id="uploadedAvatar" />
                    <div class="button-wrapper text-center">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải ảnh bìa</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden name="cover"
                                accept="image/png, image/jpeg" />
                            <input type="hidden" name="cover" value="{{ $post->cover }}">
                        </label>
                    </div>
                    @error('cover')
                        <p class="text-danger my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="title">Tiêu đề:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') ?? $post->title }}" oninput="createSlug('title','url-slug')" />
                        @error('title')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="url-slug">URL:<span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="url-slug" name="slug"
                                value="{{ old('slug') ?? $post->slug }}" />
                        </div>
                        @error('slug')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between" for="description">Mô tả:<span
                                class="text-danger">*</span>
                            <p class="mb-0">(<span id="quantity__char">{{ strLen($post->description) }}</span>/255)</p>
                        </label>
                        <textarea id="description" class="form-control" oninput="checkChar('description','quantity__char')" name="description"
                            placeholder="Khoảng 500 ký tự">{{ old('description') ?? $post->description }}</textarea>
                        @error('description')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-5">
                        <label class="form-label" for="content">Nội dung:<span class="text-danger">*</span></label>
                        <textarea id="content" class="form-control" name="content" placeholder="Nội dung bài viết">{{ old('content') ?? $post->content }}</textarea>
                        @error('content')
                            <p class="text-danger my-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        <button type="submit" class="btn btn-outline-primary">Cập nhật bài viết</button>
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
            }
        }
    </script>
@endsection
