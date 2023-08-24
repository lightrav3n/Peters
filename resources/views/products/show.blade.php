@extends('layouts.main')
@section('title', 'Soil Sampling Technology Peters Bodenprobetehnik Company')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/node_modules/css/swiper-bundle.min.css')}}">
    <!--G-lightbox-->
    <link rel="stylesheet" href="{{asset('assets/vendor/node_modules/css/glightbox.min.css')}}"/>
    <link href="{{asset('assets/vendor/videojs/video-js.css')}}" rel="stylesheet" />
    <style>
        .swiper-gallery-button-next,
        .swiper-gallery-button-prev {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            border-radius: 2.5rem;
            background-color: var(--pt-light-blue) !important;
            color: #ffffff;
            transition: all 0.25s;
        }

        .swiper-gallery-button-next:focus,
        .swiper-gallery-button-prev:focus {
            outline: none !important;
        }

        .swiper-gallery-button-next::after, .swiper-gallery-button-next::before,
        .swiper-gallery-button-prev::after,
        .swiper-gallery-button-prev::before {
            content: "";
            font-family: inherit;
        }

        .swiper-gallery-button-next::after,
        .swiper-gallery-button-prev::after {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 10px;
            height: 2px;
            background: currentColor;
            transition: transform 0.6s cubic-bezier(0.19, 1, 0.22, 1), opacity 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            transform: translate(-50%, -50%) scaleX(0.5);
            transform-origin: right;
            opacity: 0;
        }

        .swiper-gallery-button-next::before, .swiper-gallery-button-prev::before {
            border: solid currentColor;
            border-width: 0 2px 2px 0;
            display: inline-block;
            width: 8px;
            height: 8px;
            position: relative;
            transition: transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
            transform-origin: center;
            transform: rotate(-45deg);
        }

        .swiper-gallery-button-next::before, .swiper-gallery-button-prev::before {
            border: solid currentColor;
            border-width: 0 2px 2px 0;
            display: inline-block;
            width: 8px;
            height: 8px;
            position: relative;
            transition: transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
            transform-origin: center;
            transform: rotate(-45deg);
        }

        .swiper-gallery-button-prev::before {
            transform: rotate(135deg)
        }

        .swiper-gallery-button-prev::after {
            transform-origin: left
        }

        .swiper-gallery-button-next:not(.swiper-gallery-button-disabled):hover::after {
            opacity: 1;
            transform: translate(-50%, -50%) scaleX(1);
            transition: transform .8s cubic-bezier(.19, 1, .22, 1), opacity .7s cubic-bezier(.19, 1, .22, 1)
        }

        .swiper-gallery-button-next:not(.swiper-gallery-button-disabled):hover::before {
            transform: translate(2px, 0) rotate(-45deg)
        }

        .swiper-gallery-button-prev:not(.swiper-gallery-button-disabled):hover::after {
            opacity: 1;
            transform: translate(-50%, -50%) scaleX(1);
            transition: transform .8s cubic-bezier(.19, 1, .22, 1), opacity .7s cubic-bezier(.19, 1, .22, 1)
        }

        .swiper-gallery-button-prev:not(.swiper-gallery-button-disabled):hover::before {
            transform: translate(-2px, 0) rotate(135deg)
        }
        .swiper-progress .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{
            background-color: var(--pt-red);
        }
        .vjs-poster {
            border-radius: 15px;
        }
        .video-js {
            background-color: #000000;
            width: 100%;
        }
        .video-js .vjs-big-play-button {
            top: 45%;
            margin: 0 auto;
            position: inherit;
        }
        .video-js .vjs-tech {
            border-radius: 15px 15px 0 0;
            -webkit-box-shadow: 0px 0px 30px 5px rgb(0 0 0 / 75%);
            -moz-box-shadow: 0px 0px 30px 5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 30px 5px rgb(0 0 0 / 75%);
        }
        @media (max-width: 1200px) {
            .video-js {
                max-height: 70vh; } }
        @media (max-width: 991px) {
            .video-js {
                max-height: 60vh;
            } }
        @media (max-width: 767px) {
            .video-js {
                max-height: 320px;
            } }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            align-items: stretch;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
        }

        .swiper-container .swiper-zoom-container>img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endsection
@section('content')
    <main class="main-content" id="main-content">
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0  @if($product->local_video)vh-75 @endif d-flex align-items-center justify-content-center">
            <!--:Video:-->
            <div class="w-100 h-100 position-absolute end-0 top-0 bg-cover bg-no-repeat bg-center"
                 style="background-image: url({{$product->collection_name ? $product->getFirstMediaUrl($product->collection_name) : asset('assets/img/soil_sampling.jpg')}});">
                @if($product->local_video)
                    <div class="jarallax bg-dark h-100 w-100"
                         data-video-src="mp4:{{$product->getFirstMedia($product->local_video)->getUrl()}}">
                    </div>
                @endif
            </div>
            <div class="hero-overlay"></div>
            <div class="container position-relative my-6 my-lg-10">
                <div class="row mt-12 mt-lg-12 ms-lg-2 align-items-center justify-content-center">
                    <div class="col-12 col-lg-6 me-auto mb-4 mb-lg-0">
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="d-flex justify-content-between w-100">
                            <span class="badge fw-bold text-white rounded-0 px-3 pt-bg-red">
                                @switch(session()->get('language'))
                                    @case('en')
                                        {{$product->category->name_en}}
                                        @break

                                    @case('fr')
                                        {{$product->category->name_fr}}
                                        @break

                                    @default
                                        {{$product->category->name}}
                                @endswitch
                            </span>
                        </div>
                        <div>
                            <h2 class="my-4 display-5">
                                {{$product->product_name}}
                            </h2>
                            <p>
                                {{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-6 py-lg-9 position-relative">
                <div class="row">
                    <!--Sidebar-->
                    <div class="col-lg-3 d-none d-md-block">
                        <!--Sidebar sticky elements-->
                        <div class="position-sticky top-70px pt-lg-5">
                            <div class="sidebar-widget">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="mb-0 me-3 text-capitalize">{{ __('messages.other') }} {{$product->category->name}}</h5>
                                    <span class="flex-grow-1 pt-1 bg-body-tertiary"></span>
                                </div>
                                @foreach($categoryProducts as $related)
                                    <a href="{{route('site.product.show',[session()->get('language'),$related->product_slug])}}"
                                       class="p-2 hover-lift hover-shadow rounded-2 border mb-3 d-block position-relative w-75">
                                        <div class="d-flex justify-content-start w-100 mb-1 gap-2 align-items-center">
                                            <img src="{{$related->collection_name ? $related->getFirstMedia($related->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                            class="img-fluid avatar rounded-circle">
                                            <small class="text-body-secondary">{{$related->product_name}}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <!--Sidebar sticky elements-->
                            <div class="position-sticky top-0 pt-5">
                                <!--widget-->
                                <div class="sidebar-widget">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="mb-0 me-3 text-capitalize">{{ __('messages.product_categories') }}</h5>
                                        <span class="flex-grow-1 pt-1 bg-body-tertiary"></span>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($categories as $category)
                                            <a href="{{route('site.products',[session()->get('language'),$category->slug])}}"
                                            class="d-block position-relative w-75">
                                                @switch(session()->get('language'))
                                                    @case('en')
                                                        {{$category->name_en}}
                                                        @break

                                                    @case('fr')
                                                        {{$category->name_fr}}
                                                        @break

                                                    @default
                                                        {{$category->name}}
                                                @endswitch
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mb-3">{{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}</h5>
                                <div class="mb-5">
                                    {!! $product->descriptions->first() ? $product->descriptions->first()->product_description : ''!!}
                                </div>
                                @if($product->product_price)
                                    <h3>Price: {{$product->product_price}} Eur</h3>
                                @endif
                            </div>
                            @if($product->collection_name)
                                <div class="col-12">
                                    <div class="swiper-container swiper-progress position-relative rounded-1 overflow-hidden">
                                        <div class="swiper-wrapper">
                                            @foreach($product->getMedia($product->collection_name) as $media)
                                                <div class="swiper-slide rounded-1">
                                                        <img src="{{$media->getUrl('thumb-medium')}}"
                                                             alt="{{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}"
                                                             title="{{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}"
                                                             class="img-fluid c44-w-fill"
                                                        style="max-height: 600px"/>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next swiper-gallery-button-next bg-white width-6x height-6x"></div>
                                        <div class="swiper-button-prev swiper-gallery-button-prev bg-white width-6x height-6x"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if($product->category->slug === 'offers')
                            <hr class="col-lg-12 mx-auto my-5 my-lg-8 opacity-75 pt-green">
                            <div id="order" class="row">
                                <div class="col-lg-12 mx-auto">
                                    <div class="position-relative rounded border overflow-hidden mb-2 p-2">
                                        <div class="px-3 py-4">
                                            <form action="{{route('site.order.offer', $product)}}" method="post" role="form" class="needs-validation" novalidate>
                                                @csrf
                                                @method('POST')
                                                <div class="row">
                                                    <div class="mb-3 col-12">
                                                        <h5 class="text-capitalize">{{ __('messages.place_order') }}</h5>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label text-capitalize" for="name">{{ __('messages.contact_name') }}</label>
                                                        <input type="text" name="name" class="form-control" id="name"
                                                               placeholder="John Doe" maxlength="50" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('messages.validate_name') }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label text-capitalize" for="email">{{ __('messages.contact_email') }}</label>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                               placeholder="john@gmail.com" id="email"
                                                               aria-label="jackwayley@gmail.com" maxlength="50" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('messages.validate_email') }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="message" class="form-label text-capitalize">{{ __('messages.contact_message') }}</label>
                                                        <textarea class="form-control" name="message" placeholder="Message ..." maxlength="500" ></textarea>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <input required="" type="checkbox" class="form-check-input" id="conditions_before_order" name="">
                                                        <label class="form-check-label" for="conditions_before_order">
                                                            I accept the <a class="link-decoration text-capitalize" href="{{route('site.privacy.policy', session()->get('language'))}}" target="_blank">{{ __('menu.privacy_notice_policy') }}</a>
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            {{ __('messages.agree_form') }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! htmlFormSnippet() !!}
                                                    </div>
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-lg hover-lift btn-hover-text pt-btn-outline-light-blue">
                                                            <span class="btn-hover-label label-default text-capitalize">{{ __('messages.place_order') }}</span>
                                                            <span class="btn-hover-label label-hover">{{ __('messages.place_order') }}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-3 order-first order-lg-last">
                        @if($product->category->slug !== 'offers')
                            <div class="row mb-5 position-sticky top-70px pt-lg-5 sidebar-widget">
                                <div class="col-12 mt-4 mt-lg-0">
                                    <img src="{{asset('assets/img/configure.png')}}" class="img img-fluid"
                                         alt="Configure {{$product->product_name}}">
                                    <form method="post" action="{{route('site.build.product.config', $product)}}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn pt-btn-outline-light-blue text-capitalize w-100">
                                            {{ __('messages.customize_product') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
{{--                            <hr class="py-2 opacity-75 pt-green">--}}
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('assets/vendor/node_modules/js/swiper-bundle.min.js')}}"></script>
    <script>
        var swiperProgress = new Swiper(".swiper-progress", {
            spaceBetween: 0,
            centeredSlides: true,
            autoHeight: true,
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: ".swiper-gallery-button-next",
                prevEl: ".swiper-gallery-button-prev"
            }
        });
    </script>
    @if($product->local_video)
        <script src="{{asset('assets/vendor/videojs/video.min.js')}}"></script>
        <script>
            videojs("localVideo").ready(function(){
                this.volume(0);
                this.autoplay;
            });
        </script>
    @endif
@endsection
