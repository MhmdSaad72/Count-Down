@extends('layouts.app')

@section('google-fonts')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap">
@endsection

@section('style')
  <style media="screen">
  .theme-3{
    background: linear-gradient(to top, {{$themeThree->gradient()}});
  }
</style>
@endsection

@section('content')
<div class="page-holder theme theme-3 text-white {{ $progressMessage ? 'progress-used' : ''}}">
  <div class="parallax-el parallax-el-1"></div>
  <div class="parallax-el parallax-el-2"></div>
  <div class="parallax-el parallax-el-3"></div>
  <!-- Sociallinks-->
  <div class="container pt-4 px-4 text-center">
    <div class="d-flex align-items-center justify-content-between">
      <div class="logo z-index-20"><a class="d-block" href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('img/theme-1-logo.svg') }}" alt="Ionic Counter" width="100"></a></div>

      <ul class="list-inline mb-0 z-index-20">
        @if ($themeThree->checkSocial('facebookUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('facebookUrl')}}" title="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('linkedinUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('linkedinUrl')}}" title="linkedin">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('youtubeUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('youtubeUrl')}}" title="youtube">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('instagramUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('instagramUrl')}}" title="instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('behanceUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('behanceUrl')}}" title="behance">
              <i class="fab fa-behance"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('vimeoUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('vimeoUrl')}}" title="vimeo">
              <i class="fab fa-vimeo-v"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('pinterestUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('pinterestUrl')}}" title="pinterest">
              <i class="fab fa-pinterest"></i>
            </a>
          </li>
        @endif
        @if ($themeThree->checkSocial('twitterUrl'))
          <li class="list-inline-item mx-2 mx-md-1">
            <a class="social-link text-white" href="{{$themeThree->socialUrl('twitterUrl')}}" title="twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        @endif
      </ul>

      <!-- Social Menu-->
    </div>
  </div>
    <!-- Main Content-->
    <section class="pb-5 text-center">

        <div class="container">

          <!-- Page subheading -->
          <p class="h4 theme-font-main z-index-20">{{ $generalSetting->sub_heading ?? '' }}</p>

            <!-- Page main heading-->
            <h1 class="theme-3-main-heading text-shadow mb-2">{{ $generalSetting->main_heading ?? '' }}</h1>
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <p class="text-whtie lead mb-5">{{ $generalSetting->counter_message ?? ''}}</p>
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
              <!-- Counter-->
              <div class="counter" id="counter">
                <div class="counter-item">
                  <div class="days counter-no theme-3-heading px-3 px-lg-4 px-xl-5 text-shadow"></div>
                  <p class="counter-item-title">{{__('Days')}}</p>
                </div>
                <div class="counter-item">
                  <div class="hours counter-no theme-3-heading px-3 px-lg-4 px-xl-5 text-shadow"></div>
                  <p class="counter-item-title">{{__('Hours')}}</p>
                </div>
                <div class="counter-item">
                  <div class="minutes counter-no theme-3-heading px-3 px-lg-4 px-xl-5 text-shadow"></div>
                  <p class="counter-item-title">{{__('Minutes')}}</p>
                </div>
                <div class="counter-item">
                  <div class="seconds counter-no theme-3-heading px-3 px-lg-4 px-xl-5 text-shadow"></div>
                  <p class="counter-item-title">{{__('Seconds')}}</p>
                </div>
              </div>
            @endif


        </div>
    </section>


    <!-- Footer-->
    <footer class="py-4">
        <div class="container">

            <!-- Newsletter-->
            <div class="row pb-2">
                <div class="col-lg-5 mx-auto">
                    <p class="mb-3 text-center">{{ $generalSetting->newsletter ?? '' }}</p>
                    <form class="subscribing-form" action="{{ route('subscribe.user')}}" method="POST">
                      @csrf
                        <div class="input-group mb-3 p-2 rounded bg-transparent">
                            <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="e.g. Jasondoe@gmail.com" name="email" aria-label="Recipient's email address">
                            <button class="btn btn-light bg-white rounded px-4" type="submit" style="color: {{ substr($themeThree->gradient(),0,7)}} !important">{{ $generalSetting->submit_button ?? '' }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyrights-->
            <p class="mb-0 text-center">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
        </div>
    </footer>

</div>
@endsection
@section('js')
<script src="{{asset('js/counter.js')}}"></script>
<script>
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
