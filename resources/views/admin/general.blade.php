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

    <!-- Site Settings Form-->
    <form class="page-settings-form" action="{{ route('update.general' , $generalSetting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row gy-4">

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="themeHeading">Theme main heading</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="themeHeading" type="text" name="main_heading" placeholder="Type theme main heading" value="{{ $generalSetting->main_heading ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="newsLetterText">Newsletter text</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="newsLetterText" type="text" name="newsletter" placeholder="Type newsletter notifying text" value="{{ $generalSetting->newsletter ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="submitText">Submit button text</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="submitText" type="text" name="submit_button" placeholder="Type newsletter notifying text" value="{{ $generalSetting->submit_button ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="copyrightsText">Copyrights text</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="copyrightsText" type="text" name="copyrights" placeholder="Type copyrights text" value="{{ $generalSetting->copyrights ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="pageName">Page name</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="pageName" type="text" name="page_name" placeholder="Set your page title" value="{{ $generalSetting->page_name ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaKeywords">Meta keywords</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="metaKeywords" type="text" name="meta_keywords" placeholder="Enter your page keywords" value="{{ $generalSetting->meta_keywords ?? '' }}" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaAuthor">Meta author</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="metaAuthor" type="text" name="meta_author" placeholder="Set your page author" value="{{ $generalSetting->meta_author ?? '' }}" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="pageFavicon">Favicon</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <input class="form-control shadow-0" id="pageFavicon" type="file" name="favicon_image" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaDescription">Favicon</label>
                <p class="form-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <textarea class="form-control shadow-0" rows="4" id="metaDescription" name="favicon_text" placeholder="Set a description for your page">{{ $generalSetting->favicon_text ?? '' }}</textarea>
            </div>

            <div class="form-group col-12">
                <!-- Submit Button-->
                <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>Save changes</button>
            </div>

        </div>
    </form>

</section>
@endsection
