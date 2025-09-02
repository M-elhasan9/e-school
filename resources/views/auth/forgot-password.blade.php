@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #8c82ff; /* Açık mor arka plan */
        font-family: 'Roboto', sans-serif;
    }

    .forgot-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 15px;
    }

    .forgot-container {
        width: 100%;
        max-width: 450px;
    }

    .login-wrap {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2rem;
    }

    h3 {
        color: #6c63ff; /* Primary purple */
        text-align: center;
    }

    label {
        color: #6c63ff;
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

    a {
        color: #6c63ff;
    }

    a:hover {
        color: #5952d4;
        text-decoration: none;
    }
</style>

<div class="forgot-page">
    <div class="forgot-container">
        <div class="login-wrap shadow">
            <h3 class="mb-4">Reset Your Password</h3>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required>
                </div>

                <div class="form-group d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <p class="text-center mt-3">
                <a href="{{ route('login') }}">Back to Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
