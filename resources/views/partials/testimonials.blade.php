<div class="container">
    <div class="row p-4">
        <div class="col-12 py-4 text-center">
            <h2 class="text-white text-capitalize">{{ __('messages.testimonials') }}</h2>
        </div>
        <div class="col-12 col-lg-12 mx-auto">
            <!--Testimonials slider-->
            <div class="swiper swiper-testimonials">
                <div class="swiper-wrapper mb-9">
                    @foreach($testimonials as $testimonial)
                        <!--testimonial-->
                        <div class="bg-white rounded-4 p-4 swiper-slide align-items-stretch">
                            <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 pt-red"></i>
                            <p class="mb-4">
                                {{$testimonial->comment}}
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 text-primary">{{$testimonial->name}}</h6>
                                    <p class="text-body-secondary mb-0 small">{{$testimonial->additional}}
                                        &nbsp;</p>
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
