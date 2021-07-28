<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $generalSetting->page_name ?? '' }}</title>
        <meta name="description" content="{{ $generalSetting->meta_description ?? '' }}">
        <meta name="keywords" content="{{ str_replace(' ', ',', $generalSetting->meta_keywords ?? '') }}">
        <meta name="author" content="{{ $generalSetting->meta_author ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Google fonts-->
        @yield('google-fonts')

        <!-- Theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ isset($generalSetting->favicon_image) ? asset('img/' . $generalSetting->favicon_image ) : 'img/favicon.ico' }}">
        @yield('style')
    </head>

    <body>
          <!-- Success Flash Message-->
          @if (session('flash_message'))
          <div class="flash-msg-popup is-dismissed px-4 py-3">
              <p class="mb-0 w-100">
                  <i class="fas fa-check-circle me-2"></i>{{ session('flash_message') }}
              </p>
          </div>
          @endif

          @yield('content')

        <!-- JavaScript files-->
        <script>
        const deadline = "{{ $deadline ?? '' }}" ;
        const releaseUrl = "{{ $releaseUrl ?? '' }}" ;
        const initalDate = "{{ $initalDate ?? '' }}" ;
        </script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        @yield('js')
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </body>
</html>
