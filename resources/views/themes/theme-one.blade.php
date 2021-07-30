@extends('layouts.app')

@section('google-fonts')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arsenal:wght@300;400;700&amp;display=swap">
@endsection
@section('style')
  <style media="screen">
  .theme-1{
    background: url({{$themeOne->activeImage()}});
    background-size: cover;
    background-position: center center;
    overflow: hidden;
  }
</style>
@endsection

@section('content')
<div class="page-holder theme theme-1 text-white {{ $startProgress ? 'progress-used' : ''}}">
  <div id="particles-js"></div>

  <div class="pt-4 px-4 text-center">
    <div class="container-fluid d-flex align-items-center justify-content-center flex-column">
      <div class="logo z-index-20"><a class="d-block" href="{{ route('home')}}"><img class="img-fluid" src="{{asset('img/theme-1-logo.svg')}}" alt="Ionic Counter" width="70"></a></div>
      <!-- Social Menu-->
      <ul class="list-inline mb-0 social-menu z-index-20">
        @if ($themeOne->checkSocial('facebookUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('facebookUrl') }}" title="facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('twitterUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('twitterUrl') }}" title="twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('linkedinUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('linkedinUrl') }}" title="linkedin">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('vimeoUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('vimeoUrl') }}" title="vimeo">
              <i class="fab fa-vimeo-v"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('instagramUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('instagramUrl') }}" title="instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('youtubeUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('youtubeUrl') }}" title="youtube">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('behanceUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('behanceUrl') }}" title="behance">
              <i class="fab fa-behance"></i>
            </a>
          </li>
        @endif
        @if ($themeOne->checkSocial('pinterestUrl'))
          <li class="list-inline-item mx-2">
            <a class="reset-link text-white" href="{{ $themeOne->socialUrl('pinterestUrl') }}" title="pinterest">
              <i class="fab fa-pinterest"></i>
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>


    <!-- Main Content-->
    <section class="py-5 text-center">
        <div class="container pt-4 position-relative">
          <!-- Page Subheading-->
          <p class="text-uppercase text-gray-500 letter-spacing-3 fw-bold z-index-20">Site is under construction</p>
            <!-- Page main heading-->
            <h1 class="ta theme-1-main-heading text-uppercase text-shadow mb-3 z-index-20">{{ $generalSetting->main_heading ?? '' }}</h1>
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <p class="text-white mb-5">{{ $generalSetting->counter_message ?? ''}}</p>
              </div>
            </div>

            @if ($startProgress)
              <!-- Progress-->
              <div class="row z-index-20">
                <div class="col-xl-3 col-lg-5 col-md-6 col-7 mx-auto">
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
              </div>
            @else
              <!-- Counter-->
              <div class="counter z-index-20" id="counter">
                <div class="mx-1">
                  <div class="counter-item days theme-1-heading shadow h3 rounded-lg"></div>
                  <p class="counter-item-title my-3">{{__('Days')}}</p>
                </div>
                <div class="mx-1">
                  <div class="counter-item hours theme-1-heading shadow h3 rounded-lg"></div>
                  <p class="counter-item-title my-3">{{__('Hours')}}</p>
                </div>
                <div class="mx-1">
                  <div class="counter-item minutes theme-1-heading shadow h3 rounded-lg"></div>
                  <p class="counter-item-title my-3">{{__('Minutes')}}</p>
                </div>
                <div class="mx-1">
                  <div class="counter-item seconds theme-1-heading shadow h3 rounded-lg"></div>
                  <p class="counter-item-title my-3">{{__('Seconds')}}</p>
                </div>
              </div>
            @endif


        </div>
    </section>


    <!-- Footer-->
    <footer class="py-4">
        <div class="container">

            <!-- Newsletter-->
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <p class="mb-3 text-center z-index-20">{{ $generalSetting->newsletter ?? '' }}</p>
                    <form class="subscribing-form z-index-20" action="{{ route('subscribe.user')}}" method="POST">
                      @csrf
                        <div class="input-group mb-3 p-2 rounded bg-transparent">
                            <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="e.g. Jasondoe@gmail.com" name="email" aria-label="Recipient's email address">
                            <button class="btn btn-light bg-white rounded px-4" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyrights-->
            <p class="mb-0 text-center text-sm fw-light z-index-20">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
        </div>
    </footer>
</div>
@endsection
@section('js')
  <!-- JavaScript files-->
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
