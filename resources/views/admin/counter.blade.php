@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="{{asset('vendor/vanillajs-datepicker/css/datepicker-bs4.css')}}">
@endsection

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

    <!-- General Settings Form-->
    <form class="general-settings-form" action="{{ route('update.counter' , $countDown->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row gy-4">

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="releaseDate">{{__('Release date')}}</label>
                <p class="form-text mb-3">{{__('Please select the date of your project release.')}}</p>
                <input class="form-control shadow-0" id="releaseDate" type="text" name="releaseDate" placeholder="select release date" value="{{ $countDown->releaseDate ?? ''}}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Select -->
                <label class="form-label required h5 mb-0" for="releaseHours">{{__('Release Hour')}}</label>
                <p class="form-text mb-3">{{__('Please select the hour of your project release.')}}</p>
                <select class="form-select shadow-0" id="releaseHours" name="releaseHours">
                    @for ($i=1; $i <= 24; $i++) <option value="{{ $i }}" {{ $countDown->releaseHours == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group col-lg-6">
                <!-- Select-->
                <label class="form-label required h5 mb-0" for="releaseMinutes">{{__('Release Minute')}}</label>
                <p class="form-text mb-3">{{__('Please select the minute of your project release.')}}</p>
                <select class="form-select shadow-0" id="releaseMinutes" name="releaseMinutes">
                    @for ($i=1; $i < 60; $i++) <option value="{{ $i }}" {{ $countDown->releaseMinutes == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="releaseUrl">{{__('Release Url')}}</label>
                <p class="form-text mb-3">{{__('Please type the URL which the app'll redirect to.')}}</p>
                <input class="form-control shadow-0" id="releaseUrl" type="text" name="releaseUrl" placeholder="Type your release url" required="required" value="{{ $countDown->releaseUrl ?? '' }}" />
            </div>

            <div class="form-group col-12">
                <!-- Submit Button-->
                <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fa fa-check"></i>{{__('Save settings')}}</button>
            </div>

        </div>
    </form>
</section>
@endsection
@section('js')
<script src="{{asset('vendor/vanillajs-datepicker/js/datepicker.js')}}"></script>
<script>
    /* ======================================
            INITIALIZING DATEPICKER
    ======================================== */
    const elem = document.getElementById('releaseDate');
    const datepicker = new Datepicker(elem, {
        format: 'dd M 20yy'
    });

    /* ======================================
    PREVENT DATEPICKER INPUT FROM TYPING
    ======================================== */
    elem.addEventListener('keypress', function(e) {
        e.preventDefault();
    });
</script>
@endsection
