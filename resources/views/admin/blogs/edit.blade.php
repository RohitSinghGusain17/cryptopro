@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                <h1 class="m-0 font-weight-bold">{{ __('Edit Blog Post') }}</h1>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-primary">
                    <i class="fa fa-arrow-left mr-1"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow p-4 rounded">
                    <form method="post" action="{{ route('admin.blogs.update', [$blog]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Title -->
                        <div class="form-group mb-4">
                            <label for="title" class="font-weight-bold">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}" id="title" placeholder="Example: 5 Tips for Travel">
                        </div>

                        <!-- Category -->
                        <div class="form-group mb-4">
                            <label for="category_id" class="font-weight-bold">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option {{ ($blog->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload and Preview -->
                        <div class="form-group mb-4">
                            <label for="image" class="font-weight-bold">Image</label>
                            <input type="file" name="image" class="form-control mb-2" id="image">
                            @if($blog->image)
                                <img src="{{ asset('storage/'.$blog->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="200">
                            @endif
                        </div>

                        <!-- Excerpt -->
                        <div class="form-group mb-4">
                            <label for="excerpt" class="font-weight-bold">Excerpt</label>
                            <textarea class="form-control" name="excerpt" id="excerpt" rows="4" placeholder="Short summary...">{{ old('excerpt', $blog->excerpt) }}</textarea>
                        </div>

                        <!-- Description (with CKEditor) -->
                        <div class="form-group mb-4">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="6">{{ old('description', $blog->description) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success px-5 py-2">
                                <i class="fa fa-save mr-1"></i> Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.ck-editor__editable_inline {
    min-height: 250px;
}
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
