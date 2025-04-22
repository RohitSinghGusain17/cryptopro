@extends('layouts.guest')

@section('content')
    <div class="card login-card shadow-lg rounded-lg">
        <div class="card-body p-4">
            <h3 class="login-box-msg text-center font-weight-bold">{{ __('Login') }}</h3>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <!-- Email Input -->
                <div class="input-group mb-4">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block shadow-lg">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <p class="text-center mb-0">
                    <a href="{{ route('password.request') }}" class="text-primary">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Card Styling */
    .login-card {
        border-radius: 15px;
        background: linear-gradient(135deg, #6c63ff, #5367ff);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        background-color: white;
        border-radius: 15px;
    }

    /* Heading Styling */
    .login-box-msg {
        font-size: 24px;
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* Input Field Styling */
    .input-group-text {
        background-color: #f0f0f0;
        border-radius: 5px;
    }

    .form-control {
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
    }

    /* Submit Button Styling */
    .btn-primary {
        background-color: #5367ff;
        border-color: #5367ff;
        font-weight: 600;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #6c63ff;
        border-color: #6c63ff;
    }

    /* Remember Me Checkbox Styling */
    .icheck-primary input[type="checkbox"]:checked + label {
        color: #5367ff;
    }

    /* Forgot Password Link Styling */
    .text-primary {
        color: #5367ff !important;
    }

    .text-primary:hover {
        text-decoration: underline;
    }

</style>
@endsection

@section('scripts')
<script>
    // Optional: Add some JS here for handling input focus animations or extra validations
</script>
@endsection
