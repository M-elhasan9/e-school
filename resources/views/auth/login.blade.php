@extends('layouts.app')

@section('title', 'Login - StudyLab')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #ebe2f3, #d6bcee, #d0a7f5); /* Açık mor arka plan */
        font-family: 'Roboto', sans-serif;
    }

    .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px;
    }

    .login-container {
        width: 100%;
        max-width: 450px;
    }

    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .text-primary {
        color: #c388f7 !important; /* Primary purple */
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

    .form-check-label {
        color: #000; /* Remember Me yazısı siyah */
    }
</style>

<div class="login-page">
    <div class="login-container">
        <div class="card shadow p-4 p-md-5">
            <h3 class="mb-4 text-primary text-center">Sign In</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="email" class="text-primary">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="johndoe@gmail.com" required autofocus>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="text-primary">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <span class="fa fa-sign-in"></span> Login
                </button>
            </form>

            <p class="text-center mt-3">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register Now</a>
            </p>
        </div>
    </div>
</div>
@endsection
