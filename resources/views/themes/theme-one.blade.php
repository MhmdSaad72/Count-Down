@extends('layouts.app')

@section('google-fonts')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:800">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&amp;display=swap">
@endsection
@section('style')
  <style media="screen">
  .theme-1{
    background: url({{$themeOne->activeImage()}});
    background-size: cover;
    background-position: center center;
  }
</style>
@endsection

@section('content')
<div class="page-holder theme theme-1 text-white">

    <!-- Sociallinks-->
    <div class="py-4 text-center">
        <div class="container">
            <ul class="list-inline mb-0">
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
        <div class="container pt-5">
            <!-- Page main heading-->
            <h1 class="theme-1-heading heading-4x text-uppercase text-shadow mb-5">{{ $generalSetting->main_heading ?? '' }}</h1>
            <!-- Counter-->
            <div class="counter" id="counter">
                <div class="mx-1">
                    <div class="counter-item days theme-1-heading shadow h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Days</p>
                </div>
                <div class="mx-1">
                    <div class="counter-item hours theme-1-heading shadow h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Hours</p>
                </div>
                <div class="mx-1">
                    <div class="counter-item minutes theme-1-heading shadow h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Minutes</p>
                </div>
                <div class="mx-1">
                    <div class="counter-item seconds theme-1-heading shadow h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Seconds</p>
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
                    <form class="subscribing-form" action="#">
                        <div class="input-group mb-3 p-2 rounded bg-transparent">
                            <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="e.g. Jasondoe@gmail.com" aria-label="Recipient's email address">
                            <button class="btn btn-light bg-white rounded px-4" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyrights-->
            <p class="mb-0 text-center fw-light">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
        </div>
    </footer>

</div>
@endsection
