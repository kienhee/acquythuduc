@extends('layouts.admin.index')
@section('title', 'Update Partner')

@section('content')
    <x-breadcrumb parentName="Partner" parentLink="dashboard.partners.index" childrenName="Update Partner" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Update Partner" link="dashboard.partners.index" linkName="All Partners" />
                <div class="card-body">
                    <form action="{{ route('dashboard.partners.update', $partner->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="d-flex flex-column align-items-center justify-content-center gap-4 mb-3">
                                <img src="{{ $partner->logo ?? asset('images/upload.png') }}" alt="Logo"
                                    class="rounded cover-img-project img-fluid" style="width:100px;height:100px"
                                    id="uploadedAvatar" />
                                <div class="button-wrapper text-center">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Logo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden
                                            name="logo" accept="image/png, image/jpeg" />
                                        <input type="hidden" name="cover" value="{{ $partner->logo }}">
                                    </label>
                                </div>
                                @error('logo')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name:</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    id="name" name="name" value="{{ $partner->name ?? old('name') }}" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="alias" class="form-label">Bí danh:</label>
                                <input class="form-control @error('alias') is-invalid @enderror" type="text"
                                    id="alias" name="alias" value="{{ $partner->alias ?? old('alias') }}" />
                                @error('alias')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update Partner</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
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
                preview.classList.remove("d-none")
                preview.classList.add("d-block")
            }
        }
    </script>
@endsection
