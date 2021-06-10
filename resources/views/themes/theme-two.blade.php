@extends('layouts.app')

@section('google-fonts')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&amp;display=swap">
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
<div class="page-holder theme theme-2">

    <!-- Sociallinks-->
    <div class="py-4 text-center">
        <div class="container">
            <ul class="list-inline mb-0">
              @if ($themeTwo->checkSocial('facebookUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('facebookUrl') }}" title="facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('twitterUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('twitterUrl') }}" title="twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('linkedinUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('linkedinUrl') }}" title="linkedin">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('instagramUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('instagramUrl') }}" title="instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('vimeoUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('vimeoUrl') }}" title="vimeo">
                    <i class="fab fa-vimeo-v"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('pinterestUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('pinterestUrl') }}" title="pinterest">
                    <i class="fab fa-pinterest"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('youtubeUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('youtubeUrl') }}" title="youtube">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              @endif
              @if ($themeTwo->checkSocial('behanceUrl'))
                <li class="list-inline-item mx-2">
                  <a class="reset-link text-white" href="{{ $themeOne->socialUrl('behanceUrl') }}" title="behance">
                    <i class="fab fa-behance"></i>
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
            <h1 class="theme-2-heading heading-4x text-uppercase text-shadow mb-5">{{ $generalSetting->main_heading ?? '' }}</h1>
            <!-- Counter-->
            <div class="counter" id="counter">
                <div class="mx-2">
                    <div class="counter-item days theme-1-heading fw-normal h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Days</p>
                </div>
                <div class="mx-2">
                    <div class="counter-item hours theme-1-heading fw-normal h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Hours</p>
                </div>
                <div class="mx-2">
                    <div class="counter-item minutes theme-1-heading fw-normal h1 rounded-lg"></div>
                    <p class="counter-item-title my-3">Minutes</p>
                </div>
                <div class="mx-2">
                    <div class="counter-item seconds theme-1-heading fw-normal h1 rounded-lg"></div>
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
                    <form class="subscribing-form" action="{{ route('subscribe.user')}}" method="POST">
                      @csrf
                        <div class="input-group mb-3 p-2 rounded bg-light border">
                            <input class="form-control bg-none border-0 shadow-0" type="text" placeholder="e.g. Jasondoe@gmail.com" name="email" aria-label="Recipient's email address">
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
