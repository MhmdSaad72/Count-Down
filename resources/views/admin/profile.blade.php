@extends('layouts.admin')

@section('content')
<section class="py-5">
  <!-- Success Flash Message-->
  @if (session('flash_message'))
  <div class="flash-msg-popup is-dismissed px-4 py-3">
      <p class="mb-0 w-100">
          <i class="fas fa-check-circle me-2"></i>{{ session('flash_message') }}
      </p>
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger mb-4" role="alert">
      <p class="mb-0 w-100">
          <i class="fas fa-check-circle me-2"></i>{{ session('error') }}
      </p>
  </div>
  @endif
  @if ($errors->any())
  <!-- Info Alert-->
  <div class="alert alert-danger mb-4" role="alert">
      @foreach ($errors->all() as $key => $value)
      <p class="mb-0">
          <i class="fas fa-info-circle me-2"></i> {{ $value }}
      </p>
      @endforeach
  </div>
  @endif

    <!-- Info Alert-->
    <div class="alert alert-info mb-4" role="alert">
        <p class="mb-0">
            <i class="fas fa-info-circle me-2"></i>
            {{__('Leave the password fields blank if you are not interested to change.')}}
        </p>
    </div>

    <!-- Admin Profile Form-->
    <form class="admin-profile-form" action="{{ route('update.user' , $auth->id)}}" method="POST">
      @csrf
      @method('PATCH')
        <div class="row gy-4">

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="fullName">{{__('Full name')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="fullName" type="text" name="full_name" placeholder="e.g. Jason Doe" value="{{ $auth->full_name }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="userName">{{__('Username')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="userName" type="text" name="user_name" placeholder="e.g. Jasondoe" value="{{ $auth->user_name }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="userEmail">{{__('Email address')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="userEmail" type="email" name="email" placeholder="e.g. Jasondoe@admin.com" value="{{ $auth->email }}" required="required"/>
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="userPasswordCurrent">{{__('Current password')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="userPasswordCurrent" type="password" name="password" placeholder="Enter your current password" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="userPasswordNew">{{__('New password')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="userPasswordNew" type="password" name="new_password" placeholder="Enter a new password" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="userPasswordNewConfirmation">{{__('Retype new password')}}</label>
                <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                <input class="form-control shadow-0" id="userPasswordNewConfirmation" type="password" name="password_confirmation" placeholder="Retype your new password" />
            </div>

            <div class="form-group col-12">
                <!-- Submit Button-->
                <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>{{__('Save changes')}}</button>
            </div>

        </div>
    </form>
</section>
@endsection
