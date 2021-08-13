@extends('layouts.app')

@section('google-fonts')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cuprum:wght@400;700&amp;display=swap">
@endsection

@section('style')
  <style media="screen">
  .theme-4{
    background: url({{$themeFour->activeImage()}});
    background-size: cover;
    background-position: center center;
  }
</style>
@endsection

@section('content')
<div class="pgae-holder theme theme-4 d-flex justify-content-between flex-column {{ $progressMessage ? 'progress-used' : ''}}">
  <div id="particles-js"></div>
  <!-- Sociallinks-->
  <div class="pt-4 text-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo z-index-20"><a class="d-block" href="{{ route('home') }}"><img class="img-fluid" src="img/theme-1-logo-dark.svg" alt="Ionic Counter" width="60"></a></div>
      <!-- Social Menu-->
      <ul class="list-inline mb-0 z-index-20">
        <li class="list-inline-item mx-2 mx-xl-1">
            <p class="mb-0 pe-5 position-relative text-uppercase">{{__('Follow us')}}<span class="separator"></span></p>
        </li>
        @if ($themeFour->checkSocial('facebookUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('facebookUrl') }}" title="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('twitterUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('twitterUrl') }}" title="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('linkedinUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('linkedinUrl') }}" title="Linkedin">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('vimeoUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('vimeoUrl') }}" title="vimeo">
              <i class="fab fa-vimeo-v"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('youtubeUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('youtubeUrl') }}" title="youtube">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('behanceUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('behanceUrl') }}" title="behance">
              <i class="fab fa-behance"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('pinterestUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('pinterestUrl') }}" title="pinterest">
              <i class="fab fa-pinterest"></i>
            </a>
          </li>
        @endif
        @if ($themeFour->checkSocial('instagramUrl'))
          <li class="list-inline-item mx-2 mx-xl-1">
            <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('instagramUrl') }}" title="instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>
  <!-- Main Content-->
  <section class="w-100 z-index-20">
    <div class="container">
      <div class="row py-5 align-items-center">
        <div class="col-xl-6 pb-5 mb-5 pb-xl-0 mb-xl-0">
          <!-- Page main heading-->
          <p class="text-uppercase text-gray-600 small letter-spacing-3 text-center text-xl-start fw-bold z-index-20">Site is under construction</p>
          <div class="title">
            <h1 class="lh-1 text-uppercase theme-4-heading letter-spacing-0 text-center text-xl-start heading-2x" data-shadow="Comming Soon">{{ $generalSetting->main_heading ?? '' }}</h1>
          </div>
          <div class="row">
            <div class="col-xl-11">
              <p class="mb-5 lead text-center text-xl-start">{{ $generalSetting->counter_message ?? ''}}</p>
            </div>
          </div>
          <div class="row d-none d-xl-block">
            <div class="col-lg-8">
              <!-- Newsletter-->
              <form class="subscribing-form mb-3" action="#">
                <div class="input-group mb-3 p-2 rounded bg-gray-100">
                  <input class="form-control bg-none border-0 shadow-0" type="text" placeholder="e.g. Jasondoe@gmail.com" aria-label="Recipient's email address" name="email">
                  <button class="btn btn-dark rounded px-4" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-3 ms-auto pt-2 mt-5 pt-xl-0 mt-lg-0">

          @if ($progressMessage)
            <!-- Progress-->
            <div class="row z-index-20">
              <div class="col-xl-12 col-7 mx-auto">
                <div class="position-relative">
                  <div class="progress rounded-pill">
                    <div class="progress-bar rounded-pill bar-bg-custom" role="progressbar" data-width="70" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress-status text-white text-nowrap d-inline-block">
                    <div class="progress-status-text"></div>
                    <div class="progress-status-tip"></div>
                  </div>
                </div>
              </div>
          @else
            <!-- Counter-->
            <div class="row gx-2 gx-xl-4 counter text-center justify-content-end flex-wrap mb-5 z-index-20" id="counter">
              <div class="col-3 col-xl-6">
                <div class="counter-item days counter-no theme-4-heading rounded-lg h2"></div>
                <p class="counter-item-title my-2">Days</p>
              </div>
              <div class="col-3 col-xl-6">
                <div class="counter-item hours counter-no theme-4-heading rounded-lg h2"></div>
                <p class="counter-item-title my-2">Hours</p>
              </div>
              <div class="col-3 col-xl-6">
                <div class="counter-item minutes counter-no theme-4-heading rounded-lg h2"></div>
                <p class="counter-item-title my-2">Minutes</p>
              </div>
              <div class="col-3 col-xl-6">
                <div class="counter-item seconds counter-no theme-4-heading rounded-lg h2"></div>
                <p class="counter-item-title my-2">Seconds</p>
              </div>
            </div>
          @endif


        </div>
      </div>
    </div>
  </section>
  <div class="container py-3 z-index-20">
    <div class="row d-block d-xl-none">
      <div class="col-lg-8 mx-auto">
        <!-- Newsletter-->
        <form class="subscribing-form mb-3" action="{{ route('subscribe.user')}}" method="POST">
          @csrf
          <div class="input-group mb-3 p-2 rounded bg-transparent">
            <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="e.g. Jasondoe@gmail.com" aria-label="Recipient's email address">
            <button class="btn btn-light bg-white rounded px-3" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Copyrights-->
    <p class="copyrights mb-0 text-center text-xl-start text-sm">&copy; 2021 Ionichub.co All rights reserved.</p>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/counter.js')}}"></script>
  <script src="{{asset('vendor/particles.js/particles.js')}}"></script>
  <script>
  /* ==========================================================
      GET DIFFERENT PARTICLES JSON FILES ACCORDING TO VIEWPORT
  ============================================================= */
  compareViewports('js/particles.json', 'js/particles.mb.json');
    /* ======================================
        TIME ZONE JSON REQUEST
    ======================================== */
    let timezoneInput = document.getElementById('timeZone');
    if (timezoneInput) {

        window.addEventListener('load', function () {
            const timezoneRequest = new XMLHttpRequest();
            timezoneRequest.open('GET', 'js/timezone.json');

            timezoneRequest.onload = function () {
                let timezoneRequestData = JSON.parse(timezoneRequest.responseText);

                if (timezoneRequest.status >= 200 && timezoneRequest.status < 400) {
                    for (let i = 0; i < timezoneRequestData.length; i++) {
                        let timezoneDataHTML = `<option value='${timezoneRequestData[i].offset}'>${timezoneRequestData[i].name}</option>`;
                        timezoneInput.insertAdjacentHTML('beforeend', timezoneDataHTML);
                    }
                } else {
                    console.log('Ooops! server error');
                }
            }
            timezoneRequest.send();
        });

        timezoneInput.addEventListener('input', function () {
            let inputTimezoneValue = timezoneInput.options[timezoneInput.selectedIndex].value;
        });
    }

  </script>
@endsection
