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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    @yield('style')
</head>

<body>

    <div class="admin p-3 d-flex align-items-stretch transitionHolder fade">

        <!-- Start Sidebar-->
        @include('includes.sidebar')
        <!-- End Sidebar-->

        <main class="admin-main" id="main">
            <!-- Start Main Dashboard Header -->
            @include('includes.main-header')
            <!-- End Main Dashboard Header -->

            <!-- Start Content Section -->
            @yield('content')
            <!-- End Content Section -->
        </main>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @yield('js')
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
