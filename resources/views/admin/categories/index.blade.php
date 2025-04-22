@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                <h1 class="m-0 font-weight-bold">{{ __('Category Blog') }}</h1>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus mr-1"></i> Add New
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow rounded">
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 60px;">#</th>
                                        <th>Name</th>
                                        <th class="text-center" style="width: 150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.categories.edit', [$category]) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.categories.destroy', [$category]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No categories found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer bg-white clearfix">
                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.btn-success:hover {
    background-color: #28a745;
    color: white;
}
.btn-info:hover {
    background-color: #17a2b8;
    color: white;
}
.btn-danger:hover {
    background-color: #dc3545;
    color: white;
}
</style>
@endsection
