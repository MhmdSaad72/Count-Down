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
                <label class="form-label h5 mb-0 required" for="countingType">{{__('Counting Type')}}</label>
                <p class="form-text mb-3">{{__('Please select the date type of counting, progress or counter.')}}</p>
                <select class="form-select shadow-0" id="countingType"/>
                    <option value="counter">Counter</option>
                    <option value="progress">progress</option>
                  </select>
            </div>

            <div class="form-group col-lg-6 initialDateInput d-none">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="initialDate">{{__('Initial date')}}</label>
                <p class="form-text mb-3">{{__('Please select the date on which you\'ll start construction i.e. start date.')}}</p>
                <input class="form-control shadow-0" id="initialDate" type="text" name="initialDate" placeholder="select initial date" value="" />
            </div>

            <div class="form-group col-lg-6 initialTimeInput d-none">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="initialTime">{{__('Initial time')}}</label>
                <p class="form-text mb-3">{{__('Please select the time on which you\'ll start construction i.e. start date.')}}</p>
                <input class="form-control shadow-0" id="initialTime" type="time" name="initialTime" placeholder="select initial time" value="" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="releaseDate">{{__('Release date')}}</label>
                <p class="form-text mb-3">{{__('Please select the date of your project release.')}}</p>
                <input class="form-control shadow-0" id="releaseDate" type="text" name="releaseDate" placeholder="select release date" value="{{ $countDown->releaseDate ?? ''}}" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Select -->
                <label class="form-label required h5 mb-0" for="releaseTime">{{__('Release time')}}</label>
                <p class="form-text mb-3">{{__('Please select the time of your project release.')}}</p>
                <input type="time" name="releaseTime" placeholder="Type your release time" value="">
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
            INITIALIZING DATEPICKER
    ======================================== */
    const elem2 = document.getElementById('initialDate');
    const datepicker2 = new Datepicker(elem2, {
        format: 'dd M 20yy'
    });

    /* ======================================
    PREVENT DATEPICKER INPUT FROM TYPING
    ======================================== */
    elem.addEventListener('keypress', function(e) {
        e.preventDefault();
    });

    /* ======================================
    TOGGLE BETWEEN COUNTER AND PROGRESS
    ======================================== */
    let countingType = document.getElementById('countingType');
    let initialDateInput = document.querySelector('.initialDateInput');
    let initialTimeInput = document.querySelector('.initialTimeInput');
    countingType.addEventListener('change', function () {
        if (countingType.value == 'progress') {
          initialDateInput.classList.replace('d-none', 'd-block');
          initialTimeInput.classList.replace('d-none', 'd-block');
        } else {
          initialDateInput.classList.replace('d-block', 'd-none');
          initialTimeInput.classList.replace('d-block', 'd-none');
        }
    });

    window.addEventListener('load', function () {
      if (countingType.value == 'progress') {
        initialDateInput.classList.replace('d-none', 'd-block');
        initialTimeInput.classList.replace('d-none', 'd-block');
      } else {
        initialDateInput.classList.replace('d-block', 'd-none');
        initialTimeInput.classList.replace('d-block', 'd-none');
      }
    });
</script>
@endsection
