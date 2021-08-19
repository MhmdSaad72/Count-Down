@extends('layouts.app')

@section('google-fonts')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arsenal:wght@300;400;700&amp;display=swap">
@endsection
@section('style')
  <style media="screen">
  .theme-2{
    background: url({{$themeTwo->activeImage()}});
    background-size: cover;
    background-position: center center;
  }
</style>
@endsection

@section('content')
<div class="page-holder text-white theme theme-2 {{ $progressMessage ? 'progress-used' : ''}}">
  <div id="particles-js"></div>

    <!-- Sociallinks-->
    <div class="pt-4 px-4 text-center">
        <div class="container-fluid d-flex align-item-center justify-content-center flex-column">
          <div class="logo z-index-20">
            <a class="d-block" href="{{ route('home') }}">
            <img class="img-fluid" src="{{ isset($generalSetting->theme_logo) ? asset('img/' . $generalSetting->theme_logo ) : 'img/theme-1-logo.svg' }}" alt="Ionic Counter" width="70">
          </a>
        </div>
            <ul class="list-inline mb-0 social-menu z-index-20">
              @if ($themeTwo->checkSocial('facebookUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('facebookUrl') }}" title="facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('twitterUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('twitterUrl') }}" title="twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('linkedinUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('linkedinUrl') }}" title="linkedin">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('instagramUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('instagramUrl') }}" title="instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('vimeoUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('vimeoUrl') }}" title="vimeo">
                    <i class="fab fa-vimeo-v"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('pinterestUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('pinterestUrl') }}" title="pinterest">
                    <i class="fab fa-pinterest"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('youtubeUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('youtubeUrl') }}" title="youtube">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('behanceUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link" href="{{ $themeTwo->socialUrl('behanceUrl') }}" title="behance">
                    <i class="fab fa-behance"></i>
                  </a>
                </li>
              @endif
            </ul>
        </div>
    </div>


    <!-- Main Content-->
    <section class="py-5 text-center">
        <div class="container pb-3">
          <!-- Page Subheading-->
          <p class="theme-2-subheading text-uppercase text-gray-500 letter-spacing-3 fw-bold z-index-20">{{ $generalSetting->sub_heading ?? '' }}</p>
            <!-- Page main heading-->
            <h1 class="ta theme-2-main-heading text-uppercase mb-3 z-index-20">{{ $generalSetting->main_heading ?? '' }}</h1>
            <div class="row z-index-20">
              <div class="col-lg-8 mx-auto">
                <p class="mb-5">{{ $generalSetting->counter_message ?? ''}}</p>
              </div>
            </div>

            @if ($progressMessage)
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
              <!-- Counter -->
              <div class="d-flex counter" id="counter">
                <div class="mx-1 mx-lg-2">
                  <div class="counter-item days theme-1-heading fw-normal h4"></div>
                  <p class="counter-item-title mt-4 mb-3">{{__('Days')}}</p>
                </div>
                <div class="mx-1 mx-lg-2">
                  <div class="counter-item hours theme-1-heading fw-normal h4"></div>
                  <p class="counter-item-title mt-4 mb-3">{{__('Hours')}}</p>
                </div>
                <div class="mx-1 mx-lg-2">
                  <div class="counter-item minutes theme-1-heading fw-normal h4"></div>
                  <p class="counter-item-title mt-4 mb-3">{{__('Minutes')}}</p>
                </div>
                <div class="mx-1 mx-lg-2">
                  <div class="counter-item seconds theme-1-heading fw-normal h4"></div>
                  <p class="counter-item-title mt-4 mb-3">{{__('Seconds')}}</p>
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
                    <p class="mb-3 text-center">{{ $generalSetting->newsletter ?? '' }}</p>
                    <form class="subscribing-form" action="{{ route('subscribe.user')}}" method="POST">
                      @csrf
                        <div class="input-group mb-3 p-2 rounded bg-transparent">
                            <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="e.g. Jasondoe@gmail.com" name="email" aria-label="Recipient's email address">
                            <button class="btn btn-light bg-white rounded px-4" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyrights-->
            <p class="mb-0 text-center text-sm fw-light">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
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
compareViewports('js/particles2.json', 'js/particles2.mb.json');
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
