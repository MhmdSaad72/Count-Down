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
<div class="pgae-holder theme theme-4 d-flex align-items-center">
    <!-- Main Content-->
    <section class="w-100">
        <div class="container">

            <div class="row align-items-center text-white">
                <div class="col-lg-6">
                    <div class="py-5">

                        <!-- Page main heading-->
                        <div class="row">
                            <div class="col-lg-11">
                                <h1 class="theme-4-heading heading-2x">{{__('Our website is on the way')}}</h1>
                                <p class="mb-5 lead">{{ $generalSetting->counter_message ?? ''}}</p>
                            </div>
                        </div>

                        <!-- Counter-->
                        <div class="counter text-center justify-content-start mb-5" id="counter">
                            <div class="mx-2">
                                <div class="counter-item days counter-no theme-4-heading rounded-lg h2"></div>
                                <p class="counter-item-title my-2">{{__('Days')}}</p>
                            </div>
                            <div class="mx-2">
                                <div class="counter-item hours counter-no theme-4-heading rounded-lg h2"></div>
                                <p class="counter-item-title my-2">{{__('Hours')}}</p>
                            </div>
                            <div class="mx-2">
                                <div class="counter-item minutes counter-no theme-4-heading rounded-lg h2"></div>
                                <p class="counter-item-title my-2">{{__('Minutes')}}</p>
                            </div>
                            <div class="mx-2">
                                <div class="counter-item seconds counter-no theme-4-heading rounded-lg h2"></div>
                                <p class="counter-item-title my-2">{{__('Seconds')}}</p>
                            </div>
                        </div>

                        <!-- Newsletter-->
                        <div class="row">
                            <div class="col-lg-10">
                                <form class="subscribing-form mb-5" action="{{ route('subscribe.user')}}" method="POST">
                                  @csrf
                                    <div class="input-group mb-3 p-2 rounded bg-transparent">
                                        <input class="form-control bg-none border-0 shadow-0 text-white" type="text" name="email" placeholder="e.g. Jasondoe@gmail.com" aria-label="Recipient's email address">
                                        <button class="btn btn-light bg-white rounded px-4" type="submit">{{ $generalSetting->submit_button ?? '' }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Social Links-->
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <p class="mb-0 pe-5 position-relative text-uppercase">{{__('Follow us')}}<span class="separator"></span></p>
                            </li>
                            @if ($themeFour->checkSocial('facebookUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('facebookUrl') }}" title="Facebook">
                                  <i class="fab fa-facebook-f"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('twitterUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('twitterUrl') }}" title="Twitter">
                                  <i class="fab fa-twitter"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('linkedinUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('linkedinUrl') }}" title="Linkedin">
                                  <i class="fab fa-linkedin-in"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('vimeoUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('vimeoUrl') }}" title="vimeo">
                                  <i class="fab fa-vimeo-v"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('youtubeUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('youtubeUrl') }}" title="youtube">
                                  <i class="fab fa-youtube"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('behanceUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('behanceUrl') }}" title="behance">
                                  <i class="fab fa-behance"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('pinterestUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('pinterestUrl') }}" title="pinterest">
                                  <i class="fab fa-pinterest"></i>
                                </a>
                              </li>
                            @endif
                            @if ($themeFour->checkSocial('instagramUrl'))
                              <li class="list-inline-item mx-2">
                                <a class="reset-link text-white text-sm" href="{{ $themeFour->socialUrl('instagramUrl') }}" title="instagram">
                                  <i class="fab fa-instagram"></i>
                                </a>
                              </li>
                            @endif
                        </ul>

                    </div>

                    <!-- Copyrights-->
                    <div class="py-4">
                        <p class="mb-0">&copy; {{ $generalSetting->copyrights ?? '' }}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('js')
<script src="{{asset('js/counter.js')}}"></script>
@endsection
