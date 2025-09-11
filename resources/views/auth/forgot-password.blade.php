@extends('layouts.app')

@section('title', 'Forgot Password - StudyLab')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #ebe2f3, #d6bcee, #d0a7f5);
        font-family: 'Roboto', sans-serif;
    }

    .forgot-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px;
    }

    .forgot-container {
        width: 100%;
        max-width: 450px;
    }

    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .text-primary {
        color: #c388f7 !important;
    }

    .btn-primary {
        background-color: #6c63ff;
        border-color: #6c63ff;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #5952d4;
        border-color: #5952d4;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
    }

    a {
        color: #6c63ff;
        transition: 0.3s;
    }

    a:hover {
        color: #5952d4;
        text-decoration: none;
    }
</style>

<div class="forgot-page">
    <div class="forgot-container">
        <div class="card shadow p-4 p-md-5">
            <h3 class="mb-4 text-primary text-center">Reset Your Password</h3>

            <!-- Başarı mesajı -->
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Hata mesajı -->
            @error('email')
                <div class="alert alert-danger mb-3">
                    {{ $message }}
                </div>
            @enderror

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="text-primary">Email Address</label>
                    <input type="email" id="email" name="email"
                           class="form-control form-control-lg"
                           placeholder="johndoe@gmail.com"
                           value="{{ old('email') }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Send Reset Link
                </button>
            </form>

            <p class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-primary">Back to Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
