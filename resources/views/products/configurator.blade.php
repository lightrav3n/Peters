@extends('layouts.main')
@section('title', 'Soil Sampling Technology Peters Bodenprobetehnik Company')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/node_modules/css/swiper-bundle.min.css')}}">
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

.swiper-gallery-button-next::after,
.swiper-gallery-button-next::before,
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

.swiper-gallery-button-next::before,
.swiper-gallery-button-prev::before {
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

.swiper-gallery-button-next::before,
.swiper-gallery-button-prev::before {
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

.swiper-progress .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
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
    -moz-box-shadow: 0px 0px 30px 5px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 30px 5px rgb(0 0 0 / 75%);
}

@media (max-width: 1200px) {
    .video-js {
        max-height: 70vh;
    }
}

@media (max-width: 991px) {
    .video-js {
        max-height: 60vh;
    }
}

@media (max-width: 767px) {
    .video-js {
        max-height: 320px;
    }
}

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
    <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
        <img src="{{asset('assets/img/soil_sampling.jpg')}}"
            alt="Soil Sampling Technology Peters Bodenprobetehnik Company" class="bg-image bg-cover">
        <div class="container position-relative my-6 my-lg-10">
            <div class="row mt-12 mt-lg-12 ms-lg-2 align-items-center">
                <div class="col-12 me-auto mb-4 mb-lg-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <img src="{{asset('assets/img/configure.png')}}" class="img img-fluid"
                                    alt="Configure Products" width="100px">
                            </li>
                            @foreach($configProducts as $breadcrumb)
                            <li class="breadcrumb-item text-white">{{$breadcrumb['item']->product_name}}</li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if($relatedProducts && $relatedProducts->count() > 0)
    <section class="position-relative">
        <div class="container pt-9 position-relative">
            <div class="row justify-content-between mb-4">
                <div class="col-md-12">
                    <h2 class="text-capitalize">{{ __('messages.add_to_configuration') }}</h2>
                </div>
            </div>
            <div class="row mb-5">
                @foreach($relatedProducts as $related)
                <div class="col-md-6 col-xl-3 mb-4 d-flex align-items-stretch">
                    <div class="card overflow-hidden hover-lift card-product justify-content-between">
                        <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                            <div class="row g-1 justify-content-center">
                                <div class="col-12">
                                    <div class="swiper-container overflow-hidden position-relative swiper-main">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            @if($related->relatedTo !== null && $related->relatedTo->collection_name)
                                            @foreach($related->relatedTo->getMedia($related->relatedTo->collection_name)
                                            as $slides)
                                            <div class="swiper-slide">
                                                <img src="{{$slides->getUrl('thumb-medium')}}" alt="" class="img-fluid"
                                                    style="max-height: 300px" />
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="swiper-slide">
                                                <img src="{{asset('assets/img/soil_sample_product_img.jpg')}}" alt=""
                                                    class="img-fluid" style="max-height: 300px" />
                                            </div>
                                            @endif
                                        </div>
                                        <div class="swiper-button-prev swiper-gallery-button-prev text-white bg-dark">
                                        </div>
                                        <div class="swiper-button-next swiper-gallery-button-next text-white bg-dark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-product-body p-3 pt-0 text-center">
                            <a href=""
                                class="fs-5 fw-semibold d-block position-relative mb-2">{{$related->relatedTo->product_name ?? ''}}</a>
                            <form method="post" action="{{route('site.build.product.config', $related->relatedTo)}}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.add_to_configuration_btn') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="position-relative">
        <div class="container py-6 py-lg-9 position-relative">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="text-uppercase"> {{ __('menu.configuration_summary') }}</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="text-uppercase small text-body-tertiary">
                                <tr>
                                    <th></th>
                                    <th>
                                        <div class="text-uppercase" style="min-width:180px">{{ __('messages.product') }}
                                        </div>
                                    </th>
                                    <th class="text-uppercase">{{ __('messages.category') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($configProducts as $products)
                                <tr>
                                    <td>
                                        <img src="{{$products['item']->collection_name ?
                                                $products['item']->getFirstMedia($products['item']->collection_name)->getUrl('thumb') :
                                                asset('assets/img/soil_sample_product_img.jpg')}}"
                                            class="img-fluid rounded-2" style="max-height: 60px" />
                                    </td>
                                    <td>
                                        <span class="fs-6 fw-semibold">
                                            {{$products['item']->product_name}}
                                        </span>
                                    </td>
                                    <td>@switch(session()->get('language'))
                                        @case('en')
                                        {{$products['item']->category->name_en}}
                                        @break

                                        @case('fr')
                                        {{$products['item']->category->name_fr}}
                                        @break

                                        @default
                                        {{$products['item']->category->name}}
                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 text-end">
                        <a href="{{route('site.build.clear')}}"
                            class="btn btn-danger btn-lg my-4 rounded-1 fs-20 text-capitalize"
                            style="width: 280px; height: 53px; background-color: var(--pt-red)">
                            {{ __('messages.clear_configuration') }}
                        </a>
                    </div>
                </div>
                <hr class="col-lg-10 mx-auto my-5 my-lg-8 opacity-75 pt-green">
                <div class="col-lg-10 mx-auto">
                    <div class="position-relative rounded border overflow-hidden mb-2 p-2">
                        <div class="px-3 py-4">
                            <form action="{{route('site.order.finish', session()->get('language'))}}" method="post"
                                role="form" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <h5 class="text-capitalize">{{ __('messages.request_configuration_form') }}</h5>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label text-capitalize"
                                            for="name">{{ __('messages.contact_name') }}</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="John Doe" maxlength="50" required>
                                        <div class="invalid-feedback">
                                            {{ __('messages.validate_name') }}
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label text-capitalize"
                                            for="email">{{ __('messages.contact_email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="john@gmail.com" id="email" aria-label="jackwayley@gmail.com"
                                            maxlength="50" required>
                                        <div class="invalid-feedback">
                                            {{ __('messages.validate_email') }}
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="message"
                                            class="form-label text-capitalize">{{ __('messages.contact_message') }}</label>
                                        <textarea class="form-control" name="message" placeholder="Message ..."
                                            maxlength="500"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <input required="" type="checkbox" class="form-check-input"
                                            id="conditions_before_order" name="">
                                        <label class="form-check-label" for="conditions_before_order">
                                            I accept the <a class="link-decoration text-capitalize"
                                                href="{{route('site.privacy.policy', session()->get('language'))}}"
                                                target="_blank">{{ __('menu.privacy_notice_policy') }}</a>
                                        </label>
                                        <div class="invalid-feedback">
                                            {{ __('messages.agree_form') }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit"
                                            class="btn btn-lg hover-lift btn-hover-text pt-btn-outline-light-blue">
                                            <span
                                                class="btn-hover-label label-default text-capitalize">{{ __('messages.request_quotation') }}</span>
                                            <span
                                                class="btn-hover-label label-hover">{{ __('messages.place_order') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('js')
<script src="{{asset('assets/vendor/node_modules/js/swiper-bundle.min.js')}}"></script>
<script>
var swiperMain = new Swiper(".swiper-main", {
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
videojs("localVideo").ready(function() {
    this.volume(0.4);
});
</script>
@endif
@endsection