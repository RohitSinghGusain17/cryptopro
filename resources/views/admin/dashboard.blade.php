@extends('layouts.app')

@section('content')
    <!-- Content Header -->
    <div class="content-header py-4">
        <div class="container-fluid">
            <div class="row mb-3 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold text-primary">
                        <i class="fas fa-tachometer-alt me-2"></i>{{ __('Dashboard') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Admin Icon" width="100" class="mb-4">
                            <h3 class="card-title mb-3">{{ __('Welcome,') }} {{ auth()->user()->name }}!</h3>
                            <p class="card-text text-muted">We're glad to see you back. Manage your website efficiently from here.</p>

                            <div class="mt-4">
                                <a href="{{ url('admin/travel_packages') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                                    <i class="fas fa-plane-departure me-2"></i>Manage Travel Packages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection