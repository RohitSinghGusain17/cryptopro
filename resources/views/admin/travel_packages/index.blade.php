@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
            <h1 class="m-0 fw-bold text-primary">
                        <i class="fas fa-book me-2"></i>{{ __('Travel Package') }}
                    </h1>
                <a href="{{ route('admin.travel_packages.create') }}" class="btn btn-success btn-sm">
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

                <div class="card shadow-sm rounded-lg">
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 60px;">#</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th class="text-center" style="width: 150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($travel_packages as $travel_package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $travel_package->type }}</td>
                                        <td>{{ $travel_package->location }}</td>
                                        <td>₹{{ number_format($travel_package->price, 2) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.travel_packages.edit', [$travel_package]) }}" class="btn btn-sm btn-info" title="Edit Package">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.travel_packages.destroy', [$travel_package]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $travel_package->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete Package" onclick="confirmDelete({{ $travel_package->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No travel packages found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer bg-white clearfix">
                        {{ $travel_packages->links() }}
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

    .table th, .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .card-footer {
        border-top: 1px solid #e1e1e1;
    }
</style>
@endsection

@section('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the travel package permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
