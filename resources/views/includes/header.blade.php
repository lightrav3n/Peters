<header class="z-fixed header-fixed-top sticky-fixed border-bottom-lg border-info">
    <nav id="navigation" class="navbar navbar-expand-lg navbar-light bg-body h-100">
        <div class="container position-relative z-1 px-0 px-md-1">
            <!--begin:logo-->
            <a class="navbar-brand ps-2 ps-md-0 pe-0 me-0" href="{{route('site.index',session()->get('language'))}}"
               title="Bodenprobetechnik Peters Homepage">
                <img src="{{asset('assets/img/logo/bodenprobetechnik_logo_vector.svg')}}"
                     alt="bodenprobetechnik soil sampling professional equipment"
                     class="img-fluid">
            </a>
            <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last pe-2 pe-md-0">
                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                        aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                </button>
                <div class="nav-item me-2 d-none d-xl-flex">
                    <a href="{{route('site.downloads',session()->get('language'))}}" class="btn pt-btn-outline-light-blue btn-sm"
                       title="Brochure downloads">{{ __('menu.downloads') }}</a>
                </div>
                <div class="nav-item me-1 position-relative ms-2 ms-lg-3 ms-xl-4">
                    <a href="https://www.facebook.com/profile.php?id=100089198918948" target="_blank"
                       title="Bodenprobetechnik Peters Facebook"
                       class="btn btn-white p-0 rounded-circle si width-3x height-3x si-colored-linkedin d-flex align-items-center justify-content-center si-hover-facebook">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-facebook"></i>
                    </a>
                </div>
                <div class="nav-item position-relative mx-1">
                    <a href="https://www.instagram.com/bodenprobetechnik.peters.gmbh/?hl=en" target="_blank"
                       title="Bodenprobetechnik Peters Instagram"
                       class="p-0 rounded-circle si width-3x height-3x si-colored-twitter d-flex align-items-center justify-content-center si-hover-instagram">
                        <i class="bx bxl-instagram"></i>
                        <i class="bx bxl-instagram"></i>
                    </a>
                </div>
                <div class="nav-item position-relative ms-1 me-1 me-xl-4">
                    <a href="https://www.youtube.com/@bodenprobetechnikpetersgmb2404" target="_blank"
                       title="Bodenprobetechnik Peters Youtube"
                       class="p-0 rounded-circle si width-3x height-3x si-colored-youtube d-flex align-items-center justify-content-center si-hover-youtube">
                        <i class="bx bxl-youtube"></i>
                        <i class="bx bxl-youtube"></i>
                    </a>
                </div>
                <!-- Country Selector -->
                <ul class="position-lg-relative list-unstyled m-0 country-selector">
                    <li class="nav-item dropdown position-lg-static">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="d-none d-md-block fw-semibold text-capitalize">{{session()->get('language')}}</span>
                            <svg class="mx-1" width="28" height="26" viewBox="0 0 20 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0585 11.6667C14.1668 10.8333 14.1668 10 14.1668 9.16667C14.1668 8.33333 14.1252 7.5 14.0585 6.66667H18.8085C19.2863 8.29909 19.2863 10.0342 18.8085 11.6667H14.0585ZM12.1918 5C11.6668 1.74167 10.6252 0 10.0002 0C9.37517 0 8.3335 1.74167 7.8085 5H12.1918ZM7.8085 13.3333C8.32517 16.5917 9.37517 18.3333 10.0002 18.3333C10.6252 18.3333 11.6668 16.5917 12.1918 13.3333H7.8085ZM12.3918 6.66667H7.6085C7.54183 7.44167 7.50017 8.26667 7.50017 9.16667C7.50017 10.0667 7.54183 10.8917 7.6085 11.6667H12.3918C12.4585 10.8917 12.5002 10.0667 12.5002 9.16667C12.5002 8.26667 12.5002 7.44167 12.3918 6.66667ZM5.8335 9.16667C5.8335 8.33333 5.8335 7.5 5.94183 6.66667H1.19183C0.71405 8.29909 0.71405 10.0342 1.19183 11.6667H5.94183C5.87517 10.8333 5.8335 10 5.8335 9.16667ZM6.1335 13.3333H1.84183C2.41651 14.4526 3.21546 15.4416 4.18892 16.2387C5.16239 17.0358 6.28953 17.624 7.50017 17.9667C6.802 16.5044 6.34069 14.9404 6.1335 13.3333ZM13.8668 13.3333C13.6596 14.9404 13.1983 16.5044 12.5002 17.9667C13.7108 17.624 14.8379 17.0358 15.8114 16.2387C16.7849 15.4416 17.5838 14.4526 18.1585 13.3333H13.8668ZM13.8668 5H18.1585C17.5838 3.88072 16.7849 2.89173 15.8114 2.09461C14.8379 1.29749 13.7108 0.709299 12.5002 0.366667C13.1983 1.82895 13.6596 3.3929 13.8668 5ZM6.1335 5C6.34069 3.3929 6.802 1.82895 7.50017 0.366667C6.28953 0.709299 5.16239 1.29749 4.18892 2.09461C3.21546 2.89173 2.41651 3.88072 1.84183 5H6.1335Z"
                                    fill="#1A8BE2"/>
                            </svg>
                        </a>
                        @include('partials.country-select')
                    </li>
                </ul>
                @if(session()->has('config'))
                    <div class="nav-item me-4 me-lg-2 ms-0 d-none d-md-block">
                        <a href="{{route('site.product.configurator',[session()->get('language')])}}"
                           class="nav-link lh-1 position-relative pt-blue">
                            <i class="bx bx-cog fs-2 pt-blue"></i>
                            <!--card badge-->
                            <span
                                class="badge d-none d-lg-flex p-0 position-absolute end-0 top-0 lh-1 fw-semibold width-1x height-1x pt-bg-red shadow-sm rounded-circle flex-center">{{count($configProducts)}}</span>
                        </a>
                    </div>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="mainNavbarTheme">
                <!--begin:Navbar items-->
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="{{route('site.index',session()->get('language'))}}"
                           title="Bodenprobetechnik Peters Homepage">{{ __('menu.home') }}</a>
                    </li>
                    <!--begin:products-->
                    <li class="nav-item dropdown position-lg-static">
                        <a class="nav-link dropdown-toggle text-capitalize"
                           href="{{route('site.products.index',session()->get('language'))}}" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">{{ __('menu.products') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-fw px-lg-0 rounded-0" style="left: 25%">
                            <div class="dropdown-scroll-lg">
                                <div class="row mx-lg-0 justify-content-lg-around p-2">
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-5 mb-2 mb-md-0">
                                        <div class="h-100">
                                            <div class="mb-4">
                                                <a href="{{route('site.products.index',session()->get('language'))}}"
                                                   title="Bodenprobetechnik Peters Products"
                                                   class="link-hover-underline-light-blue d-flex justify-content-lg-between align-items-center">
                                                    <h1 class="fs-2 d-flex align-items-baseline menu-card-title text-capitalize">
                                                        {{ __('menu.products') }}
                                                    </h1>
                                                    <svg class="mx-2 pb-1 pb-lg-0 pt-lg-1" width="36" height="18"
                                                         viewBox="0 0 34 12"
                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M28.4797 0.238643L33.7571 5.42386C34.081 5.74205 34.081 6.25794 33.7571 6.57614L28.4797 11.7614C28.1558 12.0795 27.6308 12.0795 27.3069 11.7614C26.9831 11.4432 26.9831 10.9273 27.3069 10.6091L31.1687 6.81478H0V5.18522H31.1687L27.3069 1.39091C26.9831 1.07272 26.9831 0.556834 27.3069 0.238643C27.6308 -0.0795478 28.1558 -0.0795478 28.4797 0.238643Z"
                                                              fill="#366a9e"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <p style="font-size: 16px; line-height: 16px;">
                                                {{ __('menu.products_text') }}
                                            </p>
                                        </div>
                                    </div>
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-7">
                                        <div class="h-100">
                                            <div class="d-grid gap-2 menu-cards text-center"
                                                 style="grid-template-columns: 50% 50%">
                                                <div class="position-relative">
                                                    <a href="{{route('site.products',[session()->get('language'),'soil-sample-technologies'])}}"
                                                       title="Bodenprobetechnik Peters Soil sample technology">
                                                        <img
                                                            src="{{asset('assets/img/menu/bodenprobetechnik_menu_sstech_one.jpg')}}"
                                                            class="img-fluid"
                                                            alt="Bodenprobetechnik Peters Soil sample technology">
                                                        <span class="menu-overlay"></span>
                                                        <h2 class="text-white position-absolute start-0 end-0 top-0 bottom-0 d-flex justify-content-center align-items-center fs-5 text-break">
                                                            {{ __('menu.technologies') }}</h2>
                                                    </a>
                                                </div>
                                                <div class="position-relative">
                                                    <a href="{{route('site.products',[session()->get('language'),'manual-soil-sampling'])}}"
                                                       title="Bodenprobetechnik Peters Soil sample attachments">
                                                        <img
                                                            src="{{asset('assets/img/menu/bodenprobetechnik_menu_manual_tools.jpg')}}"
                                                            class="img-fluid"
                                                            alt="Bodenprobetechnik Peters Soil sample attachments">
                                                        <span class="menu-overlay"></span>
                                                        <h2 class="text-white position-absolute start-0 end-0 top-0 bottom-0 d-flex justify-content-center align-items-center fs-5 text-break">
                                                            {{ __('menu.attachments') }}
                                                        </h2>
                                                    </a>
                                                </div>
                                                <div class="position-relative">
                                                    <a href="{{route('site.products',[session()->get('language'),'tr-gersysteme'])}}"
                                                       title="Bodenprobetechnik Peters Soil sample trailers">
                                                        <img
                                                            src="{{asset('assets/img/menu/bodenprobetechnik_menu_trailers.jpg')}}"
                                                            class="img-fluid"
                                                            alt="Bodenprobetechnik Peters Soil sample trailers">
                                                        <span class="menu-overlay"></span>
                                                        <h2 class="text-white position-absolute start-0 end-0 top-0 bottom-0 d-flex justify-content-center align-items-center fs-5 text-break">
                                                            {{ __('menu.trailers') }}
                                                        </h2>
                                                    </a>
                                                </div>
                                                <div class="position-relative">
                                                    <a href="{{route('site.products',[session()->get('language'),'sonderbau'])}}"
                                                       title="Bodenprobetechnik Peters Soil sample vehicles">
                                                        <img
                                                            src="{{asset('assets/img/menu/bodenprobetechnik_menu_vehicles_one.jpg')}}"
                                                            class="img-fluid"
                                                            alt="Bodenprobetechnik Peters Soil sample vehicles">
                                                        <span class="menu-overlay"></span>
                                                        <h2 class="text-white position-absolute start-0 end-0 top-0 bottom-0 d-flex justify-content-center align-items-center text-center fs-5 text-break">
                                                            {{ __('menu.vehicles') }}
                                                        </h2>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--end:products-->
                    <!--begin:Offers-->
                    @if($offers->products->count())
                        <li class="nav-item">
                            <a class="nav-link text-capitalize"
                               href="{{route('site.products',[session()->get('language'),'offers'])}}"
                               title="Bodenprobetechnik Peters Soil sample vehicles offers">{{ __('menu.offers') }}</a>
                        </li>
                    @endif
                    <!--end:Offers-->
                    <!--begin:About-->
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="{{route('site.about',session()->get('language'))}}"
                           title="Bodenprobetechnik Peters About Us">{{ __('menu.about') }}</a>
                    </li>
                    <!--end:About-->
                    <li class="nav-item">
                        <a class="nav-link text-capitalize"
                           href="{{route('site.news.index',session()->get('language'))}}"
                           title="Bodenprobetechnik Peters Soil sample News">{{ __('menu.news') }}</a>
                    </li>
                    <!--begin:Contact-->
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="{{route('site.contact',session()->get('language'))}}"
                           title="Bodenprobetechnik Peters Contact">{{ __('menu.contact') }}</a>
                    </li>
                    <!--end:Contact-->
                </ul>
                <!--end:Navbar items-->
            </div>
        </div>
    </nav>
</header>
