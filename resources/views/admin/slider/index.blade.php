@extends('layouts.admin.index')
@section('title', 'Quản lí sliders')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Quản lí sliders</a>
            </li>
            <li class="breadcrumb-item active">Danh sách</li>
        </ol>
    </nav>

    <div class="card mb-4">
        <div class="px-3 pt-2">
            <x-alert />
        </div>
        <div class="card-header">
            <h5 class="card-tile mb-0">Hình ảnh sản phẩm</h5>
        </div>
        <form action="{{ route('dashboard.sliders.update', 1) }}" method="post" class="card-body">
            @csrf
            @method('put')
            <div class="mb-3">
                <div class="upload__box">
                    <label id="upload" data-input="thumbnail" data-preview="holder" class="form-label upload-label mb-3">
                        <p class="mb-0">Thêm hình
                            ảnh <span class="text-danger">*</span></p>
                        <small>(Nên chọn hình tỉ lệ 1:1)</small>
                    </label>

                    <input id="thumbnail" class="form-control" type="text" name="images"
                        value="{{ $sliders->images ?? '' }}" hidden multiple>
                    <div id="holder" class="d-flex justify-content-center gap-3 flex-wrap">
                        @if ($sliders && $sliders->images)
                            @foreach (explode(',', $sliders->images) as $item)
                                <img src="{{ $item }}" class="preview-img">
                            @endforeach
                        @endif
                    </div>
                </div>
                @error('images')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Lưu lại</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#upload').filemanager('image');
    </script>
@endsection
