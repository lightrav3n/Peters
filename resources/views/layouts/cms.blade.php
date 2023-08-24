<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Peters Admin</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

    <!--Bootstrap icons-->
    <link href="{{asset('cms/assets/fonts/bootstrap-icons/bootstrap-icons.css?v=2')}}" rel="stylesheet">

    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..900&family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--Simplebar css-->
    <link rel="stylesheet" href="{{asset('cms/assets/vendor/css/simplebar.min.css')}}">
    <!--Choices css-->
    <link rel="stylesheet" href="{{asset('cms/assets/vendor/css/choices.min.css')}}">
    <!--Main style-->
    <link rel="stylesheet" href="{{asset('cms/assets/css/style.min.css')}}">
    @yield('css')
</head>
<body>
<!--////////////////// PreLoader Start//////////////////////-->
<div class="loader bg-gradient-primary text-white">
    <div
        class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">
        <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spinner-grow  me-2"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
            <div>
                <span>Loading...</span>
            </div>
        </div>
    </div>
</div>
<!--////////////////// /.PreLoader END//////////////////////-->
<div class="d-flex flex-column flex-root">
    <!--Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        @auth @include('includes.cms.sidebar') @endauth
        <!--///////////Page content wrapper///////////////-->
        <main class="@yield('page-class', 'page-content d-flex flex-column flex-row-fluid')">
            @auth @include('includes.cms.header') @endauth
            @yield('content')
        </main>
    </div>
</div>

<!--////////////Theme Core scripts Start/////////////////-->
<script src="{{asset('cms/assets/js/theme.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });
</script>
@yield('js')
</body>
</html>
