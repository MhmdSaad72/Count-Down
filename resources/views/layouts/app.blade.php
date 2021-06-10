<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Coming soon page</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Google fonts-->
        @yield('google-fonts')
        <!-- Theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
        @yield('style')
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>

    <body>

          @yield('content')

        <!-- JavaScript files-->
        <script>
        const deadline = "{{ $deadline ?? '' }}" ;
        const releaseUrl = "{{ $releaseUrl ?? '' }}" ;
        </script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/counter.js')}}"></script>
        @yield('js')
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </body>
</html>
