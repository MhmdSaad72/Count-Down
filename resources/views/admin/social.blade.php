@extends('layouts.admin')
@php
use \App\Http\Controllers\AdminController;
@endphp
@section('content')
<section class="py-5">
    <!-- Success Flash Message-->
    @include('includes.flash-message')
    
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

    <!-- Social Links Form-->
    <form class="social-links-form" action="{{ route('update.social')}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row gy-4">

            <div class="form-group col-md-6">
                <label class="form-label h6" for="facebookUrl">{{__('Facebook')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="facebookUrl" type="text" name="facebookUrl" placeholder="https://www.facebook.com" aria-label="facebookUrl"
                      aria-describedby="facebookUrl-addon" value="{{ AdminController::getSocialUrl('facebookUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="facebookUrl-addon">
                        <i class="text-muted fab fa-fw fa-facebook-f"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="twitterUrl">{{__('Twitter')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="twitterUrl" type="text" name="twitterUrl" placeholder="https://www.twitter.com" aria-label="twitterUrl" aria-describedby="twitterUrl-addon"
                      value="{{ AdminController::getSocialUrl('twitterUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="twitterUrl-addon">
                        <i class="text-muted fab fa-fw fa-twitter"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="instagramUrl">{{__('Instagram')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="instagramUrl" type="text" name="instagramUrl" placeholder="https://www.instagram.com" aria-label="instagramUrl"
                      aria-describedby="instagramUrl-addon" value="{{ AdminController::getSocialUrl('instagramUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="instagramUrl-addon">
                        <i class="text-muted fab fa-fw fa-instagram"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="youtubeUrl">{{__('Youtube')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="youtubeUrl" type="text" name="youtubeUrl" placeholder="https://www.youtube.com" aria-label="youtubeUrl" aria-describedby="youtubeUrl-addon"
                      value="{{ AdminController::getSocialUrl('youtubeUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="youtubeUrl-addon">
                        <i class="text-muted fab fa-fw fa-youtube"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="vimeoUrl">{{__('Vimeo')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="vimeoUrl" type="text" name="vimeoUrl" placeholder="https://www.vimeo.com" aria-label="vimeoUrl" aria-describedby="vimeoUrl-addon"
                      value="{{ AdminController::getSocialUrl('vimeoUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="vimeoUrl-addon">
                        <i class="text-muted fab fa-fw fa-vimeo-v"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="linkedinUrl">{{__('Linkedin')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="linkedinUrl" type="text" name="linkedinUrl" placeholder="https://www.linkedin.com" aria-label="linkedinUrl"
                      aria-describedby="linkedinUrl-addon" value="{{ AdminController::getSocialUrl('linkedinUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="linkedinUrl-addon">
                        <i class="text-muted fab fa-fw fa-linkedin-in"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="behanceUrl">{{__('Behance')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="behanceUrl" type="text" name="behanceUrl" placeholder="https://www.behance.com" aria-label="behanceUrl" aria-describedby="behanceUrl-addon"
                      value="{{ AdminController::getSocialUrl('behanceUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="behanceUrl-addon">
                        <i class="text-muted fab fa-fw fa-behance"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label h6" for="pinterestUrl">{{__('Pinterest')}}</label>
                <!-- Icon Input-->
                <div class="input-group flex-row-reverse">
                    <input class="form-control border-start-0 shadow-0 rounded rounded-start-0 bg-white" id="pinterestUrl" type="text" name="pinterestUrl" placeholder="https://www.pinterest.com" aria-label="pinterestUrl"
                      aria-describedby="pinterestUrl-addon" value="{{ AdminController::getSocialUrl('pinterestUrl') }}" />
                    <span class="input-group-text pe-0 border-end-0 rounded rounded-end-0 bg-white" id="pinterestUrl-addon">
                        <i class="text-muted fab fa-fw fa-pinterest"></i>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <!-- Submit Button-->
                <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>{{__('Save Settings')}}</button>
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
