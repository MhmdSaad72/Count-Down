@extends('layouts.app')

@section('google-fonts')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Limelight&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&amp;display=swap">
@endsection

@section('style')
  <style media="screen">
  .theme-3{
    background: url({{$themeThree->activeImage()}});
    background-size: cover;
    background-position: center center;
  }
</style>
@endsection

@section('content')
<div class="page-holder theme theme-3 text-white">

    <!-- Keep it there -->
    <div class="just-to-fix-flex"></div>

    <!-- Main Content-->
    <section class="py-5 text-center">

        <div class="container pt-5">
            <ul class="list-inline my-5">
              @if ($themeThree->checkSocial('facebookUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('facebookUrl')}}" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('linkedinUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('linkedinUrl')}}" title="linkedin">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('youtubeUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('youtubeUrl')}}" title="youtube">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('instagramUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('instagramUrl')}}" title="instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('behanceUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('behanceUrl')}}" title="behance">
                    <i class="fab fa-behance"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('vimeoUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('vimeoUrl')}}" title="vimeo">
                    <i class="fab fa-vimeo-v"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('pinterestUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('pinterestUrl')}}" title="pinterest">
                    <i class="fab fa-pinterest"></i>
                  </a>
                </li>
              @endif
              @if ($themeThree->checkSocial('twitterUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white social-link" href="{{$themeThree->socialUrl('twitterUrl')}}" title="twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              @endif
            </ul>

            <!-- Page main heading-->
            <h1 class="theme-3-heading heading-4x text-uppercase text-shadow mb-3">{{ $generalSetting->main_heading ?? '' }}</h1>
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <p class="mb-5 lead">{{ $generalSetting->counter_message ?? ''}}</p>
              </div>
            </div>

            <!-- Counter-->
            <div class="counter" id="counter">
                <div class="counter-item">
                    <div class="days counter-no theme-3-heading h1"></div>
                    <p class="counter-item-title my-2">{{__('Days')}}</p>
                </div>
                <div class="counter-item">
                    <div class="hours counter-no theme-3-heading h1"></div>
                    <p class="counter-item-title my-2">{{__('Hours')}}</p>
                </div>
                <div class="counter-item">
                    <div class="minutes counter-no theme-3-heading h1"></div>
                    <p class="counter-item-title my-2">{{__('Minutes')}}</p>
                </div>
                <div class="counter-item">
                    <div class="seconds counter-no theme-3-heading h1"></div>
                    <p class="counter-item-title my-2">{{__('Seconds')}}</p>
                </div>
            </div>

        </div>
    </section>


    <!-- Footer-->
    <footer class="py-4">
        <div class="container">

            <!-- Newsletter-->
            <div class="row pb-5">
                <div class="col-lg-5 mx-auto">
                    <p class="lead mb-3 text-center">{{ $generalSetting->newsletter ?? '' }}</p>
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
            <p class="mb-0 text-center">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
        </div>
    </footer>

</div>
@endsection
@section('js')
<script src="{{asset('js/counter.js')}}"></script>
@endsection
