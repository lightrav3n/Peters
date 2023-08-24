<!--begin:Footer-->
<footer id="footer" class="footer position-relative bg-black">
    <div class="container pt-9 pt-lg-11">
        <div class="row mb-7">
            <div class="col-12 col-lg-4 position-relative">
                <div class="footer-logo mb-3 my-md-2">
                    <a href="{{route('site.index',session()->get('language'))}}">
                        <img src="{{asset('assets/img/logo/bodenprobetechnik_logo_vector.svg')}}" class="img-fluid">
                    </a>
                </div>
                <span class="pt-footer-logo-line"></span>
            </div>
            <div class="col-12 col-lg-8 mt-md-0 d-flex flex-column justify-content-center ps-3 ps-lg-8">
                <span class="text-white lh-1 mb-2 fs-36 fw-bold">{{ __('menu.footer_moto_h1') }}</span>
                <span class="text-white fs-27">
                    {{ __('menu.footer_moto_h2') }}
                </span>
            </div>
        </div>
        <hr class="mb-5 mt-0 opacity-75 pt-green">
    </div>
    <div class="pb-5">
        <div class="container">
            <div class="row justify-content-md-between align-items-center text-white">
                <div id="footer-social"
                     class="d-flex mb-3 mb-md-0 col-sm-6 col-md-3 justify-content-center justify-content-lg-start align-items-center gap-2">
                    <a href="https://www.facebook.com/profile.php?id=100089198918948" target="_blank"
                       class="d-inline-block text-white mb-1">
                        <i class="bx bxl-facebook fs-4"></i>
                    </a>
                    <a href="https://www.instagram.com/bodenprobetechnik.peters.gmbh/?hl=en" target="_blank"
                       class="d-inline-block text-white mb-1">
                        <i class="bx bxl-instagram fs-4"></i>
                    </a>
                    <a href="https://www.youtube.com/@bodenprobetechnikpetersgmb2404" target="_blank"
                       class="d-inline-block text-white mb-1">
                        <i class="bx bxl-youtube fs-4"></i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-9">
                    <nav class="nav mb-4 mb-md-0 footer-nav d-flex justify-content-center justify-content-lg-end">
                        <a class="nav-link px-0 pt-0 text-white">© 2023 Bodenprobetechnik Peters GmbH</a>
                        <a class="nav-link px-0 pt-0 text-capitalize" href="{{route('site.notice.policy', session()->get('language'))}}">{{ __('menu.site_notice') }}</a>
                        <a class="nav-link px-0 pt-0 text-capitalize" href="{{route('site.cookie.policy', session()->get('language'))}}">{{ __('menu.cookie_policy') }}</a>
                        <a class="nav-link px-0 pt-0 text-capitalize" href="{{route('site.privacy.policy', session()->get('language'))}}">{{ __('menu.privacy_notice_policy') }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end:Footer-->
