@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7"></div> {{-- Boş alan, tasarım için --}}
         <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Register Now</h3>

              {{-- Laravel backend ile uyumlu form --}}
              <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group">
                      <label for="name">Full Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required autofocus>
                  </div>

                  <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required>
                  </div>

                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                  </div>

                  <div class="form-group d-flex justify-content-end mt-4">
                      <button type="submit" class="btn btn-primary submit">
                          <span class="fa fa-paper-plane"></span> Register
                      </button>
                  </div>
              </form>

              <p class="text-center mt-2">
                  Already have an account? <a href="{{ route('login') }}">Sign In</a>
              </p>
          </div>
         </div>
      </div>
   </div>
</section>
@endsection
