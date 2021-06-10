@extends('layouts.admin')

@section('content')
<section class="py-5">
    <!-- Success Flash Message-->
    @if (session('flash_message'))
    <div class="flash-msg-popup is-dismissed px-4 py-3">
        <p class="mb-0 w-100">
            <i class="fas fa-check-circle me-2"></i>{{ session('flash_message') }}
        </p>
    </div>
    @endif
    <h2 class="h5 text-uppercase letter-spacing-0 mb-0">Choose theme background</h2>
    <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>

    <!-- Theme Edit Form-->
    <form class="theme-edit-form" action="{{ route('update.theme' , $singleTheme->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row gy-2 gx-3 mb-4 align-items-stretch">

            @foreach ($singleTheme->images as $key => $value)
            <!-- Theme default background item-->
            <div class="col-xl-2 col-lg-3 col-6 form-group">
                <input class="btn-check" type="radio" name="themebg" id="themeOneBg{{ $loop->iteration }}" onchange="altBackground()" value="{{$value->image}}">
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
                        <small class="d-block mb-0">Custom image</small>
                    </span>
                </label>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">

                <!-- Image uploader-->
                <div class="form-group mb-4 d-none" id="altBackground">
                    <h2 class="form-label h5 mb-0">Custom Image</h2>
                    <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    <div class="uploader" id="file-upload-form">
                        <input class="d-none" id="file-upload" type="file" name="fileUpload" accept="image/*">
                        <label class="d-block" id="file-drag" for="file-upload">
                            <img class="rounded hidden img-fluid mb-3" id="file-image" src="#" alt="Preview">
                            <span class="text-muted text-center text-sm px-2 py-5" id="start">
                                <i class="fas fa-image fa-2x" aria-hidden="true"></i>
                                <small class="d-block mb-0">Upload custom background</small>
                                <span class="hidden" id="notimage">Please select .jpg or .png image</span>
                            </span>
                            <span class="hidden" id="response">
                                <small class="d-block fw-normal text-muted mb-0 text-center" id="messages"></small>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Included social links                    -->
                <div class="form-group mb-4">
                    <h5 class="form-label h5 mb-0">Social links included</h5>
                    <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>

                    <div class="row gy-3">

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkFacebook" name="facebookUrl" type="checkbox" {{ $singleTheme->checkSocial('facebookUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkFacebook">
                                    <i class="me-2 fab fa-facebook-f"></i>
                                    Facebook
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkTwitter" name="twitterUrl" type="checkbox" {{ $singleTheme->checkSocial('twitterUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkTwitter">
                                    <i class="me-2 fab fa-twitter"></i>
                                    Twitter
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkInstagram" name="instagramUrl" type="checkbox" {{ $singleTheme->checkSocial('instagramUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkInstagram">
                                    <i class="me-2 fab fa-instagram"></i>
                                    Instagram
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkYoutube" name="youtubeUrl" type="checkbox" {{ $singleTheme->checkSocial('youtubeUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkYoutube">
                                    <i class="me-2 fab fa-youtube"></i>
                                    Youtube
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkVimeo" name="vimeoUrl" type="checkbox" {{ $singleTheme->checkSocial('vimeoUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkVimeo">
                                    <i class="me-2 fab fa-vimeo-v"></i>
                                    Vimeo
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkLinkedin" name="linkedinUrl" type="checkbox" {{ $singleTheme->checkSocial('linkedinUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkLinkedin">
                                    <i class="me-2 fab fa-linkedin-in"></i>
                                    Linkedin
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkBehance" name="behanceUrl" type="checkbox" {{ $singleTheme->checkSocial('behanceUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkBehance">
                                    <i class="me-2 fab fa-behance"></i>
                                    Behance
                                </label>
                            </div>
                        </div>

                        <!-- Social Links Input-->
                        <div class="col-xl-4 col-6">
                            <div class="form-check text-sm text-uppercase letter-spacing-0">
                                <input class="form-check-input form-check-input-success" id="checkPinterest" name="pinterestUrl" type="checkbox" {{ $singleTheme->checkSocial('pinterestUrl') ? 'checked' : '' }}>
                                <label class="form-check-label ps-1" for="checkPinterest">
                                    <i class="me-2 fab fa-pinterest"></i>
                                    Pinterest
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <!-- Submit Button-->
                    <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>Save changes</button>
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
</script>
@endsection
