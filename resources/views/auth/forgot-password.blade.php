@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Reset Your Password</h3>

              <form method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required>
                  </div>
                  <div class="form-group d-flex justify-content-end mt-4">
                      <button type="submit" class="btn btn-primary">
                          Send Reset Link
                      </button>
                  </div>
              </form>

              <p class="text-center mt-2">
                  <a href="{{ route('login') }}">Back to Login</a>
              </p>
          </div>
         </div>
      </div>
   </div>
</section>
@endsection
