@extends('layouts.main')
@section('title', 'Bodenprobetechnik Peters GmbH')
@section('css')
    <!--Swiper-->
    <link rel="stylesheet" href="{{asset('assets/vendor/node_modules/css/swiper-bundle.min.css')}}">
    <style>
        .opacity-60 {
            opacity: .6 !important;
        }

        .section-100vh-lg {
            height: auto;
        }

        .h-90px {
            height: 40px;
        }
    .h-400px {
        height: auto;
    }
        @media (min-width: 992px) {
            .section-100vh-lg {
                height: 100vh;
            }

            .h-90px {
                height: 90px;
            }

            #expertise {
                transform: translate(-50%, -50%);
                top: 65%;
                left: 85%
            }

            #contact-form {
                transform: translate(-50%, -50%);
                left: 35%;
                top: 60%
            }
            .h-400px {
                height: 400px;
            }
        }
        @media (min-width: 1200px), (min-width: 960px) and (-webkit-device-pixel-ratio: 1.25) {
            .section-100vh-lg {
                height: auto;
            }
        }
        .swiper-pagination {
            color: var(--pt-red);
        }
    </style>
@endsection
@section('content')
    <!--begin:main content-->
    <main>
        <section class="bg-dark vh-100 text-white d-flex align-items-center position-relative overflow-hidden">
            <!--:Video:-->
            <div class="w-100 h-100 opacity-60 position-absolute end-0 top-0 bg-cover bg-no-repeat bg-center"
                 style="background-image: url({{asset('assets/videos/bodenprobetechnik_peters_soil_sampling_video_cover.jpg')}});">
                <div class="jarallax bg-dark h-100 w-100"
                     data-video-src="mp4:{{asset('assets/videos/Bodenprobetechnik_Peters_GmbH.mp4')}}">
                </div>
            </div>
            <div class="container position-relative py-5">
                <div class="row">
                    <div class="col-xl-9 mx-auto text-center">
                        <!--:Heading:-->
                        <h1 class="fw-lighter mb-2 fs-1">
                            BODENPROBETECHNIK
                        </h1>
                        <h2 class="mb-4 mb-lg-5 fw-medium" style="font-size: 85px">
                            PETERS
                        </h2>
                        <!--:Subheading:-->
                        <p class="mb-5 mb-lg-7 lead w-lg-75 mx-auto">
                            {{$headline->page_content}}
                        </p>
                        <!--:Action Button:-->
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#features"
                               class="btn btn-lg btn-outline-white border-1 px-8 px-lg-14 text-uppercase">{{ __('messages.discover') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="features"
                 class="overflow-hidden position-relative pt-bg-light-blue section-100vh-lg d-lg-flex align-items-center">
            <div class="py-9 py-lg-11 container">
                <!--sampling row-->
                <div class="row pt-4 pt-md-6">
                    <div class="d-grid gap-6 gap-md-3"
                         style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
                        <!--sampling Column-->
                        @foreach($productCards as $productCard)
                            <div class="d-flex align-items-stretch text-center" data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="position-relative card border-1 rounded-3 rounded-top-end-0 rounded-bottom-start-0 hover-shadow-xl hover-lift pt-0 p-4 d-flex justify-content-between">
                                    <div class="d-table">
                                        <div
                                            class="py-8">
                                            <img src="{{$productCard->getFirstMediaUrl($productCard->collection_name)}}"
                                                 class="img-fluid"
                                                 alt="{{$productCard->title}}">
                                        </div>
                                        <h5 class="mb-3 h-90px d-flex justify-content-center align-items-center fs-4 pt-light-blue">
                                            {{$productCard->title}}</h5>
                                        <p class="pt-light-blue fw-light py-2 py-lg-6">
                                            {{$productCard->text}}
                                        </p>
                                    </div>
                                    <div class="">
                                        <a href="{{route('site.products',[session()->get('language'),$productCard->link])}}"
                                           class="btn btn-hover-arrow btn-lg my-2 rounded-1 btn-outline-dark btn-outline-red fs-20"
                                           style="width: 220px; height: 50px; background-color: transparent">
                                        <span class="text-capitalize"
                                              style="color: var(--c44-dark-blue)">{{ __('messages.see_more') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative section-100vh-lg d-lg-flex align-items-center my-8">
            <div class="container overflow-hidden position-relative py-lg-9">
                <div class="row justify-content-center align-items-stretch text-center p-lg-14">
                    @foreach($productCards2 as $productCard2)
                        <div class="col-12 col-lg-4 h-100 d-flex @if($loop->odd) flex-column @else flex-column flex-lg-column-reverse @endif p-lg-0">
                            <div class="text-center position-relative p-2 p-lg-4 d-grid align-content-around h-400px"
                                 data-aos="fade-right">
                                <h2 class="mb-4 fs-3 pt-light-blue text-capitalize">{{$productCard2->title}}</h2>
                                <p class="mb-5 fs-6 pt-light-blue">
                                    {{$productCard2->text}}
                                </p>
                                <a href="{{url(session()->get('language').$productCard2->link)}}"
                                   class="btn btn-hover-arrow c44-bg-blue btn-lg my-2 rounded-1 btn-outline-dark fs-20 m-auto d-none d-lg-block"
                                   style="width: 220px; height: 50px; background-color: transparent"
                                   title="{{$productCard2->title}}">
                                    <span class="text-white text-capitalize">{{ __('messages.see_more') }}</span>
                                </a>
                            </div>
                            <div class="p-lg-0 mb-10 mb-lg-0">
                                <img src="{{$productCard2->getFirstMediaUrl($productCard2->collection_name)}}" alt="{{$productCard2->title}}"
                                     class="img-fluid c44-w-fill h-400px">
                                <a href="{{url(session()->get('language').$productCard2->link)}}"
                                   class="btn btn-hover-arrow c44-bg-blue btn-lg my-2 rounded-1 btn-outline-dark fs-20 m-auto d-block d-lg-none"
                                   style="width: 220px; height: 50px; background-color: transparent"
                                   title="{{$productCard2->title}}">
                                    <span class="text-white text-capitalize">{{ __('messages.see_more') }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="position-relative overflow-hidden py-8 pt-bg-light-blue">
            <div class="container mt-lg-10 mb-lg-15">
                <div class="row position-relative justify-content-center align-items-center">
                    <div class="col-12 col-lg-8">
                        <img src="{{asset('assets/img/pt_team-min-one.jpg')}}" alt="professional soil sampling" class="img-fluid">
                    </div>
                    <div id="expertise" class="col-12 col-lg-5 position-relative position-lg-absolute mt-4 mb-6">
                        <div class="p-4 p-lg-8 bg-white border border-dark" data-aos="fade-left">
                            <div class="text-center">
                                <h2 class="pt-light-blue fs-3 mb-6 mb-lg-12 text-capitalize">{{ __('messages.expertise') }}</h2>
                                <p class="mb-6 mb-lg-12 pt-light-blue">
                                    {{$expertise->page_content}}
                                </p>
                                <a href="{{route('site.about', [session()->get('language')])}}"
                                    class="btn btn-lg pt-btn-outline-light-blue border-1 px-8 text-capitalize rounded-1 w-100 pt-light-blue">
                                    {{ __('messages.view_more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row p-4">
                    <div class="col-12 py-4 text-center">
                        <h2 class="text-white text-capitalize">{{ __('messages.affiliated_companies') }}</h2>
                        <p class="text-white">{{ __('messages.affiliated_companies_text') }}</p>
                    </div>
                    <div class="col-12 col-lg-12 mx-auto">
                        <div class="swiper swiper-partners">
                            <div class="swiper-wrapper mb-9">
                                @foreach($partners as $partner)
                                    <div class="card-hover card shadow-sm hover-lift hover-shadow-lg overflow-hidden rounded-3 swiper-slide justify-content-center" style="min-height: 300px">
                                        <div class="justify-content-between">
                                            <img src="{{$partner->getFirstMediaUrl($partner->collection_name)}}" alt="{{$partner->name}}"
                                                 class="img-fluid img-zoom position-relative">
                                            <div class="position-relative d-block p-4">
                                                <!--Date-->
                                                <a href="https://{{$partner->website}}" class="d-flex justify-content-start w-100 pb-3"
                                                title="{{$partner->name}}" target="_blank">
                                                    <small class="text-body-secondary">{{$partner->website}}</small>
                                                </a>
                                                <div>
                                                    <div class="text-reset">
                                                        <h5 class="link-multiline">{{$partner->name}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div
                                    class="swiper-pagination w-auto ms-4 me-3 bottom-0 position-relative swiperT-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- testimonials--}}
        </section>
        <section class="position-relative py-8" id="contact">
            <div class="container mt-lg-10 mb-lg-15">
                <div class="row position-relative justify-content-center align-items-center">
                    <div class="col-12 col-lg-8">
                        <img src="{{asset('assets/img/hp/contact_us-min-one.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div id="contact-form" class="col-12 col-lg-5 position-relative position-lg-absolute mt-4 mb-6">
                        <div class="p-4 bg-white pt-border-light-blue" data-aos="fade-right">
                            <div class="position-relative">
                                <h2 class="display-5 mb-6 text-center pt-light-blue text-capitalize">
                                    {{ __('menu.contact') }}
                                </h2>
                                <!-- Contacts Form-->
                                <form action="{{route('site.contact.send', session()->get('language'))}}" method="post"
                                      role="form" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-8 mb-3">
                                            <label class="form-label text-capitalize" for="name">{{ __('messages.contact_name') }}</label>
                                            <input type="text" name="name"
                                                   class="form-control form-control-lg rounded-0" id="name"
                                                   placeholder="John Doe" maxlength="50" required="">
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-12 col-lg-8 mb-3">
                                            <label class="form-label text-capitalize" for="email">{{ __('messages.contact_email') }}</label>
                                            <input type="email" class="form-control form-control-lg rounded-0"
                                                   name="email" id="email" placeholder="john@gmail.com" maxlength="50"
                                                   required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid email address
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <!-- Message -->
                                        <div class="col-12 col-lg-8 mb-3">
                                            <label for="message" class="form-label text-capitalize">{{ __('messages.contact_message') }}</label>
                                            <textarea class="form-control form-control-lg rounded-0" name="message"
                                                      placeholder="Message here...."
                                                      maxlength="500"
                                                      required=""
                                                      style="display: block; overflow-wrap: break-word; resize: vertical;"></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a message in the textarea.
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-12 col-lg-8 mb-6">
                                            {!! htmlFormSnippet() !!}
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-12 col-lg-8 mb-3">
                                            <button
                                                class="btn btn-lg pt-btn-outline-light-blue border-1 px-8 text-capitalize rounded-1 w-100">
                                                {{ __('messages.send') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                <!-- End Contact Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <!--Swiper slider-->
    <script src="{{asset('assets/vendor/node_modules/js/swiper-bundle.min.js')}}"></script>
    <script>
        const swiper = new Swiper('.swiper-testimonials', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,

            pagination: {
                el: ".swiperT-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });

        const swiperPartners = new Swiper('.swiper-partners', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiperT-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });
    </script>
@endsection
