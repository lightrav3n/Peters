<div class="row mb-5">
    {{$relatedId}}
    @foreach($related as $prod)
        <div class="col-md-6 col-xl-4 mb-4 d-flex align-items-stretch">
            <div class="card overflow-hidden hover-lift card-product justify-content-between">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                    <div class="row g-1 justify-content-center">
                        <div class="col-12">
                            <div class="swiper-container overflow-hidden position-relative swiper-main">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @if($prod->relatedTo->collection_name)
                                        @foreach($prod->relatedTo->getMedia($prod->relatedTo->collection_name) as $slides)
                                            <div class="swiper-slide">
                                                <img src="{{$slides->getUrl('thumb-medium')}}" alt="" class="img-fluid">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide">
                                            <img src="{{asset('assets/img/soil_sample_product_img.jpg')}}" alt="" class="img-fluid">
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
                <button wire:click="selectId({{$prod->relatedTo->id}})">Related</button>
                <div class="card-product-body p-3 pt-0 text-center">
                    <a href="#!" class="fs-5 fw-semibold d-block position-relative mb-2">{{$prod->relatedTo->product_name}}</a>
                    <form method="post" action="{{route('site.build.product.config', $prod->relatedTo)}}">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary">
                            Add Livewire
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
