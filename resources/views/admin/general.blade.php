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
                <label class="form-label h5 mb-0 required" for="themeHeading">{{__('Theme main heading')}}</label>
                <p class="form-text mb-3">{{__('The large heading appears on counter\'s page center.')}}</p>
                <input class="form-control shadow-0" id="themeHeading" type="text" name="main_heading" placeholder="Type theme main heading" value="{{ $generalSetting->main_heading ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="newsLetterText">{{__('Newsletter text')}}</label>
                <p class="form-text mb-3">{{__('The newsletter\'s text message encourages users to subscribe.')}}</p>
                <input class="form-control shadow-0" id="newsLetterText" type="text" name="newsletter" placeholder="Type newsletter notifying text" value="{{ $generalSetting->newsletter ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="submitText">{{__('Submit button text')}}</label>
                <p class="form-text mb-3">{{__('The text value of newsletter\'s submit button.')}}</p>
                <input class="form-control shadow-0" id="submitText" type="text" name="submit_button" placeholder="Type newsletter notifying text" value="{{ $generalSetting->submit_button ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="copyrightsText">{{__('Copyrights text')}}</label>
                <p class="form-text mb-3">{{__('Page\'s footer copyrights message.')}}</p>
                <input class="form-control shadow-0" id="copyrightsText" type="text" name="copyrights" placeholder="Type copyrights text" value="{{ $generalSetting->copyrights ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0 required" for="pageName">{{__('Page name')}}</label>
                <p class="form-text mb-3">{{__('The name you can see on the browser\'s tab... This value is a <meta> tag value.')}}</p>
                <input class="form-control shadow-0" id="pageName" type="text" name="page_name" placeholder="Set your page title" value="{{ $generalSetting->page_name ?? '' }}" required="required" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaKeywords">{{__('Meta keywords')}}</label>
                <p class="form-text mb-3">{{__('Type some keywords relative to your released project... This value is a <meta> tag value.')}}</p>
                <input class="form-control shadow-0" id="metaKeywords" type="text" name="meta_keywords" placeholder="Enter your page keywords" value="{{ $generalSetting->meta_keywords ?? '' }}" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaAuthor">{{__('Meta author')}}</label>
                <p class="form-text mb-3">{{__('Type the author name of your released project... This value is a <meta> tag value.')}}</p>
                <input class="form-control shadow-0" id="metaAuthor" type="text" name="meta_author" placeholder="Set your page author" value="{{ $generalSetting->meta_author ?? '' }}" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="pageFavicon">{{__('Favicon')}}</label>
                <p class="form-text mb-3">{{__('upload the browser\'s tab favicon, the image uploaded dimensions must be 80x80px.')}}</p>
                <input class="form-control shadow-0" id="pageFavicon" type="file" name="favicon_image" />
            </div>

            <div class="form-group col-lg-6">
                <!-- Input-->
                <label class="form-label h5 mb-0" for="metaDescription">{{__('Timezone')}}</label>
                <p class="form-text mb-3">{{__('Add a short brief about your released project... This value is a <meta> tag value.')}}</p>
                <select class="form-select shadow-0" name="timezone">
                  @foreach ($timeZones as $key => $value)
                    <option value="{{ $value }}" {{ $generalSetting->timezone == $value ? 'selected' : ''}}>{{ $value }}</option>
                  @endforeach
                </select>
              </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <div class="form-group col-lg-6">
                      <!-- Input-->
                      <label class="form-label h5 mb-0" for="metaDescription">{{__('Meta description')}}</label>
                      <p class="form-text mb-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing.')}}</p>
                      <textarea class="form-control shadow-0" rows="4" id="metaDescription" name="meta_description" placeholder="Set a description for your page">{{ $generalSetting->favicon_text ?? '' }}</textarea>
                  </div>
                </div>
              </div>
            </div>




            <div class="form-group col-12">
                <!-- Submit Button-->
                <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>{{__('Save changes')}}</button>
            </div>

        </div>
    </form>

</section>
@endsection
