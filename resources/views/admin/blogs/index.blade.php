@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1 class="m-0">{{ __('Blog') }}</h1>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Excerpt</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>
                                                <a href="{{ Storage::url($blog->image) }}" target="_blank">
                                                    <img src="{{ Storage::url($blog->image) }}" width="80" height="60" class="rounded shadow-sm" alt="Blog Image">
                                                </a>
                                            </td>
                                            <td>{{ Str::limit($blog->excerpt, 50) }}</td>
                                            <td><span class="badge bg-info">{{ $blog->category->name }}</span></td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-warning me-2"> <i class="fa fa-edit"></i> Edit</a>              
                                                <form onclick="return confirm('Are you sure you want to delete this blog?');" class="d-inline-block" action="{{ route('admin.blogs.destroy', $blog) }}" method="post">
                                                    @csrf 
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                                </form>                              
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $blogs->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
