@extends('layouts.app')

@section('google-fonts')
<link rel='stylesheet' href="https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400&display=swap">
@endsection

@section('style')
  <style>
  .admin-login::before {
    background: url({{asset('/img/theme-2.jpg')}});
    background-position: center center;
    background-size: cover;
  }
</style>
@endsection
@section('content')
  <div class="admin-login d-flex align-items-center p-4 transitionHolder fade">

      <section class="w-100">
          <div class="row">
              <div class="col-xl-5 col-lg-6 mx-auto">

                  <!-- Login card-->
                  <div class="card shadow border-0 rounded-lg">
                      <div class="card-body p-4 p-lg-5">

                          <!-- Counter Login-->
                          <img class="mb-5 d-block mx-auto" src="{{ asset('img/counter-logo.svg') }}" alt="Ionic Counter" width="200">

                          <!-- Login Form-->
                          <form class="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                              <div class="form-group mb-4">
                                  <label class="form-label h6 mb-2" for="username">{{__('Username or email')}}</label>
                                  <!-- Icon Input-->
                                  <div class="input-group flex-row-reverse">
                                      <input class="form-control border-start-0 shadow-0 rounded rounded-start-0" id="username" type="text" name="username" placeholder="Enter your username or email address" aria-label="username" aria-describedby="username-addon" value="admin@admin.com"/>
                                      <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0" id="username-addon">
                                          <i class="text-muted fas fa-user"></i>
                                      </span>
                                  </div>
                              </div>

                              <div class="form-group mb-4">
                                  <label class="form-label h6 mb-2" for="password">{{__('Password')}} </label>
                                  <!-- Icon Input-->
                                  <div class="input-group flex-row-reverse">
                                      <input class="form-control border-start-0 shadow-0 rounded rounded-start-0" id="password" type="password" name="password" placeholder="Enter your password" aria-label="password" aria-describedby="password-addon" value="123456789"/>
                                      <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0" id="password-addon">
                                          <i class="text-muted fas fa-lock"></i>
                                      </span>
                                  </div>
                              </div>

                              <div class="form-group mb-4">
                                  <!-- Submit Button-->
                                  <button class="btn btn-gradient-success w-100" type="submit"> <i class="me-2 fas fa-door-open"></i>Login</button>
                              </div>

                              <div class="form-group">
                                  <!-- Alternative Login-->
                                  <p class="mb-0 text-center"> <span class="text-muted">{{__('Forget your password?')}} </span><a class="text-success reset-link" href="{{ route('login-alt') }}">{{__('Login with security key')}} </a></p>
                              </div>

                          </form>

                      </div>
                  </div>
              </div>
          </div>

      </section>
  </div>
@endsection
