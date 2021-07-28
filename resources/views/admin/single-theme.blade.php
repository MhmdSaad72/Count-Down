@extends('layouts.admin')

@section('content')
<section class="py-5">
    <!-- Success Flash Message-->
    @include('includes.flash-message')

    <h2 class="h5 text-uppercase letter-spacing-0 mb-3">{{__('Choose theme background')}}</h2>

    <!-- Theme Edit Form-->
    <form class="theme-edit-form" action="{{ route('update.theme' , $singleTheme->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row gy-2 gx-3 mb-4 align-items-stretch">
          @if ($singleTheme->name != 'Theme Three')
            @foreach ($singleTheme->images as $key => $value)
              <!-- Theme default background item-->
              <div class="col-xl-2 col-lg-3 col-6 form-group">
                <input class="btn-check" type="radio" name="themebg" id="themeOneBg{{ $loop->iteration }}" onchange="altBackground()" value="{{$value->image}}" {{ $singleTheme->checkImage($value->id) ? 'checked' : '' }}>
                <label class="bg-cover bg-center theme-label rounded-lg bg-cover bg-center" for="themeOneBg{{ $loop->iteration }}" style="background: url({{ asset('img/' . $value->image)}})">
                  <span class="theme-label-identifier bg-success text-white px-2 text-xs text-uppercase letter-spacing-0 fw-bold">
                    <i class="fas fa-check-circle me-2"></i>
                    Active
                  </span>
                </label>
              </div>
            @endforeach


            <!-- Theme custom image input-->
            <div class="col-xl-2 col-lg-3 col-6 form-group">
                <input class="btn-check" id="themeOneAltBg" type="radio" name="themebg" onchange="altBackground()">
                <label class="bg-cover bg-center theme-label text-center choose-custom-bg" for="themeOneAltBg">
                    <span class="theme-label-overlay"><i class="fas fa-image"></i>
                        <small class="d-block mb-0">{{__('Custom image')}}</small>
                    </span>
                </label>
            </div>
          @endif
        </div>


        <!-- NEW [ONLY AVAILABEL FOR INDEX 3 - MAKE GRADIENT BACKGROUND ] -->
        <div class="row gy-2 gx-3 mb-4 align-items-stretch">
          @if ($singleTheme->name == 'Theme Three')
            @foreach ($singleTheme->images as $key => $value)
              <!-- Theme default gradient item-->
              <div class="col-xl-2 col-lg-3 col-6 form-group">
                <input class="btn-check" type="radio" name="themegrad" id="themeGrad{{$key}}" onchange="altBackground()" value="{{ $value->gradient }}" {{ $singleTheme->checkImage($value->id) ? 'checked' : '' }}>
                <label class="bg-cover bg-center theme-label rounded-lg bg-cover bg-center" for="themeGrad{{$key}}" style="
                background: linear-gradient(to top, {{$value->gradient}})
                ">
                  <span class="theme-label-identifier bg-success text-white px-2 text-xs text-uppercase letter-spacing-0 fw-bold">
                    <i class="fas fa-check-circle me-2"></i>
                    Active
                  </span>
                </label>
              </div>
            @endforeach

            <!-- Theme custom gradient input-->
            <div class="col-xl-2 col-lg-3 col-6 form-group">
              <input class="btn-check" id="themeCustomGrad" type="radio" name="themebg" onchange="altGradient()">
              <label class="bg-cover bg-center theme-label text-center choose-custom-bg" for="themeCustomGrad">
                <span class="theme-label-overlay"><i class="fas fa-image"></i>
                  <small class="d-block mb-0">{{__('Make custom Gradient')}}</small>
                </span>
              </label>
            </div>


            <!-- Theme custom gradient input-->
            <div class="row gy-4 mb-5 d-none custom-grad-inputs">
              <div class="col-lg-6">
                <label class="form-label h5 mb-0" for="gradient_color_start">{{__('Gradient custom colors')}}</label>
                <p class="form-text mb-3">The first color of theme background gradient</p>
                <div class="d-flex">
                  <input class="form-control form-control-color me-2" type="color" name="gradient_color_1" value="">
                  <input class="form-control form-control-color me-2" type="color" name="gradient_color_2" value="">
                </div>
              </div>
            </div>

          @endif

        </div>
        <!-- END NEW [ONLY AVAILABEL FOR INDEX 3 - MAKE GRADIENT BACKGROUND ] -->




        <div class="row">
            <div class="col-lg-6">

                <!-- Image uploader-->
                <div class="form-group mb-4 d-none" id="altBackground">
                    <h2 class="form-label h5 mb-0">{{__('Custom Image')}}</h2>
                    <p class="form-text mb-3">{{__('It\'s recommended to upload image resembles the current tint.')}}</p>
                    <div class="uploader" id="file-upload-form">
                        <input class="d-none" id="file-upload" type="file" name="fileUpload" accept="image/*">
                        <label class="d-block" id="file-drag" for="file-upload">
                            <img class="rounded hidden img-fluid mb-3" id="file-image" src="#" alt="Preview">
                            <span class="text-muted text-center text-sm px-2 py-5" id="start">
                                <i class="fas fa-image fa-2x" aria-hidden="true"></i>
                                <small class="d-block mb-0">{{__('Upload custom background')}}</small>
                                <span class="hidden" id="notimage">{{__('Please select .jpg or .png image')}}</span>
                            </span>
                            <span class="hidden" id="response">
                                <small class="d-block fw-normal text-muted mb-0 text-center" id="messages"></small>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Included social links                    -->
                <div class="form-group mb-4">
                    <h5 class="form-label h5 mb-0">{{__('Social links included')}}</h5>
                    <p class="form-text mb-3">{{__('Choose which social icons should be appear on your counter\'s page.')}}</p>

                    <div class="row gy-3">

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkFacebook" name="facebookUrl" type="checkbox" {{ $singleTheme->checkSocial('facebookUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkFacebook">
                                    <i class="me-2 fab fa-facebook-f"></i>
                                    {{__('Facebook')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkTwitter" name="twitterUrl" type="checkbox" {{ $singleTheme->checkSocial('twitterUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkTwitter">
                                    <i class="me-2 fab fa-twitter"></i>
                                    {{__('Twitter')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkInstagram" name="instagramUrl" type="checkbox" {{ $singleTheme->checkSocial('instagramUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkInstagram">
                                    <i class="me-2 fab fa-instagram"></i>
                                    {{__('Instagram')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkYoutube" name="youtubeUrl" type="checkbox" {{ $singleTheme->checkSocial('youtubeUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkYoutube">
                                    <i class="me-2 fab fa-youtube"></i>
                                    {{__('Youtube')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkVimeo" name="vimeoUrl" type="checkbox" {{ $singleTheme->checkSocial('vimeoUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkVimeo">
                                    <i class="me-2 fab fa-vimeo-v"></i>
                                    {{__('Vimeo')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkLinkedin" name="linkedinUrl" type="checkbox" {{ $singleTheme->checkSocial('linkedinUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkLinkedin">
                                    <i class="me-2 fab fa-linkedin-in"></i>
                                    {{__('Linkedin')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkBehance" name="behanceUrl" type="checkbox" {{ $singleTheme->checkSocial('behanceUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkBehance">
                                    <i class="me-2 fab fa-behance"></i>
                                    {{__('Behance')}}
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkPinterest" name="pinterestUrl" type="checkbox" {{ $singleTheme->checkSocial('pinterestUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkPinterest">
                                    <i class="me-2 fab fa-pinterest"></i>
                                    {{__('Pinterest')}}
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <!-- Submit Button-->
                    <button class="btn btn-gradient-success me-2" type="submit"> <i class="me-2 fas fa-check"></i>{{__('Save changes')}}</button>
                    <a class="btn btn-outline-success my-1" href="{{ route('themes') }}">
                      <i class="fas fa-chalkboard me-2"></i>
                      {{__('Back to themes')}}
                    </a>
                </div>

            </div>
        </div>
    </form>

</section>
@endsection
@section('js')
<script src="{{asset('js/file-upload.js')}}"></script>
<script>
    /* =============================================
            SHOW/HIDE CUSTOM THENE BACKGROUND INPUT
            ============================================== */
    function altBackground() {
        let customBgInputToggler = document.getElementById('themeOneAltBg');
        let customBgInput = document.getElementById('altBackground');
        if (customBgInputToggler.checked) {
            customBgInput.classList.toggle('d-none');
        } else {
            customBgInput.classList.add('d-none');
        }
    }
    function altGradient() {
        let customGradInputToggler = document.getElementById('themeCustomGrad');
        let customgradInputs = document.querySelector('.custom-grad-inputs');
        if (customGradInputToggler.checked) {
            customgradInputs.classList.remove('d-none');
        } else {
            customgradInputs.classList.add('d-none');
        }
    }
</script>
@endsection
