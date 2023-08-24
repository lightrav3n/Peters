<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/ico">
    @include('partials.meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',$siteSettings['site_name']->option_value)</title>
    <!--Box Icons-->
    <link rel="stylesheet" href="{{asset('assets/fonts/boxicons/css/boxicons.min.css')}}">
    <!--AOS Animations-->
    <link rel="stylesheet" href="{{asset('assets/vendor/node_modules/css/aos.css')}}">
    <!--Iconsmind Icons-->
    <link rel="stylesheet" href="{{asset('assets/fonts/iconsmind/iconsmind.css')}}">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{asset('assets/css/theme.css?v=1.15')}}" rel="stylesheet">
    @livewireStyles
    {!! htmlScriptTagJsApi() !!}
    @if($siteSettings['fb_pixel']->option_value !== '#!')
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{$siteSettings['fb_pixel']->option_value}}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={{$siteSettings['fb_pixel']->option_value}}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    @yield('css')
</head>

<body>
@include('includes.header')

@yield('content')

@include('includes.footer')

<a href="#" class="toTop">
    <i class="bx bxs-up-arrow"></i>
</a>

<!-- scripts -->
<script src="{{asset('assets/js/theme.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/node_modules/js/jquery.min.js')}}"></script>
@livewireScripts
@yield('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(\Session::has('success'))
        Swal.fire(
            'Success',
            '{{\Session::get('success')}}',
            'success'
        )
    @endif
    $('#navigation .navbar-nav a.nav-link').each(function (){
        if (this.href === '{{ Request::fullUrl() }}'){
            $(this).addClass('menu-link-active');
        }
            @if(Request::is('*/products/offers'))
                else if(this.href.indexOf("offers") > -1)
                {
                    $(this).addClass('menu-link-active');
                }
           @endif
        @if(Request::is('*/products/*') && !Request::is('*/products/offers'))
                else if((this.href.indexOf("products") > -1) && (this.href.indexOf("offers") === -1))
                    {
                        $(this).addClass('menu-link-active');
                        console.log(this.href.indexOf("offers"));
                    }
            @elseif(Request::is('*/news/*'))
                else if(this.href.indexOf("news") > -1)
                    {
                        $(this).addClass('menu-link-active');
                    }
        @endif
    });
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }
    if (isMobile()) {
        // Code to run if user is on a mobile device
    } else {
        document.querySelectorAll('#navigation .dropdown a.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                location.href = e.target.href;
            });
        });
    }

    $(document).ready(() => {
        let url = location.href.replace(/\/$/, "");
        if (location.hash) {
            const hash = url.split("#");
            $('html, body').animate({
                scrollTop: $("#" + hash[1]).offset().top
            }, 1200);
        }
    });
</script>
</body>
</html>
