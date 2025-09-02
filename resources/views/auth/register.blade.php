@extends('layouts.app')

@section('title', 'Register - StudyLab')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #ebe2f3, #d6bcee, #d0a7f5); /* Açık mor arka plan */
        font-family: 'Roboto', sans-serif;
    }

    .register-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 15px;
    }

    .register-container {
        width: 100%;
        max-width: 450px;
    }

    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .text-primary {
        color: #6c63ff !important; /* Primary purple */
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

    input.form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
        transition: 0.3s;
    }

    input.form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 5px rgba(122, 117, 208, 0.5);
    }
</style>

<div class="register-page">
    <div class="register-container">
        <div class="card shadow p-4 p-md-5">
            <h3 class="mb-4 text-primary text-center">Register Now</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="text-primary">Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="John Doe" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="text-primary">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="johndoe@gmail.com" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="text-primary">Password</label>
                    <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirmation" class="text-primary">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            </form>

            <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign In</a></p>
        </div>
    </div>
</div>
@endsection
