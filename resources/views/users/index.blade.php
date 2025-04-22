@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold">{{ __('Users') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow-lg rounded-lg">
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer bg-white clearfix">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection

@section('styles')
<style>
    /* Button Hover Styles */
    .btn:hover {
        transition: background-color 0.3s ease-in-out;
    }

    /* Table Styles */
    .table th, .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    /* Card Styles */
    .card {
        border-radius: 10px;
        border: 1px solid #e1e1e1;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f7f7f7;
        border-bottom: 1px solid #e1e1e1;
    }

    .card-footer {
        border-top: 1px solid #e1e1e1;
    }

    .pagination {
        justify-content: center;
        padding: 10px;
    }

    /* Pagination Styles */
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        border: none;
        font-weight: 600;
    }

    .pagination .page-item .page-link:hover {
        background-color: #007bff;
        color: white;
    }

</style>
@endsection

@section('scripts')
<!-- Optional JavaScript for any action buttons (e.g., delete, view, edit) -->
<script>
    // You can add scripts for action buttons (like SweetAlert2) here if needed
</script>
@endsection
