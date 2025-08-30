@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7"></div> {{-- Boş alan, tasarım için --}}
         <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Sign In</h3>

              {{-- Laravel backend ile uyumlu form --}}
              <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required autofocus>
                  </div>

                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>

                  <div class="form-group d-flex justify-content-between align-items-center">
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="remember" id="remember">
                          <label class="form-check-label" for="remember">Remember Me</label>
                      </div>
                      <a href="{{ route('password.request') }}">Forgot Password?</a>
                  </div>

                  <div class="form-group d-flex justify-content-end mt-4">
                      <button type="submit" class="btn btn-primary submit">
                          <span class="fa fa-sign-in"></span> Login
                      </button>
                  </div>
              </form>

              <p class="text-center mt-2">
                  Don't have an account? <a href="{{ route('register') }}">Register Now</a>
              </p>
          </div>
         </div>
      </div>
   </div>
</section>
@endsection
