@extends('layouts.app')
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
                        <img class="mb-5 d-block mx-auto" src="img/counter-logo.svg" alt="Ionic Counter" width="200">

                        <!-- Login Form-->
                        <form class="login-form" action="{{ route('login') }}" method="POST">
                          @csrf
                            <div class="form-group mb-4">
                                <label class="form-label h6 mb-0" for="uniqueKey">Unique security key</label>
                                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                <!-- Icon Input-->
                                <div class="input-group flex-row-reverse">
                                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0" id="uniqueKey" type="text" name="security_key" placeholder="Enter your unique security key" aria-label="uniqueKey"
                                      aria-describedby="uniqueKey-addon" />
                                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0" id="uniqueKey-addon">
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
                                <p class="mb-0 text-center"> <span class="text-muted">Don't have the key? </span><a class="text-success reset-link" href="{{ route('login') }}">Login with your credentials</a></p>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
  <script src="{{asset('js/admin.js')}}"></script>
@endsection
