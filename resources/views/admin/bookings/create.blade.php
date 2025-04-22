@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                <h1 class="m-0 font-weight-bold">{{ __('Create Category') }}</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">
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
            <div class="col-lg-8">
                <div class="card shadow p-4 rounded">
                    <form method="post" action="{{ route('admin.categories.store') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group mb-4">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                id="name" 
                                placeholder="Example: Delhi" 
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

                        <!-- Save Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success px-5 py-2">
                                <i class="fa fa-save mr-1"></i> Save
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
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}
</style>
@endsection