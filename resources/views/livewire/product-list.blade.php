<div class="container py-6 py-lg-9 position-relative">
    <div class="row pb-6 d-flex align-items-center justify-content-center">
        @if($products->total() > 0)
        <div class="col-md-6">
            <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-search fs-5 opacity-100" style="color: var(--pt-light-blue)"></i>
                        </span>
                <input wire:model="search" type="text" class="form-control" name="searchProd" value="" placeholder="Search in Products ...">
                <span class="input-icon-end clearSearch" wire:click="search('')">
                            <i class="bx bx-x fs-5 opacity-100" style="color: var(--pt-red)"></i>
                        </span>
            </div>
        </div>
        @endif
    </div>
    <div class="row mb-5">
        @forelse($products as $product)
            <div class="col-md-6 col-xl-4 mb-4 d-flex align-items-stretch">
                <div class="card overflow-hidden hover-lift card-product rounded-1 d-flex justify-content-between">
                    <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                        <h2 class="py-0">{{$product->product_name}}</h2>
                        <hr class="my-4 opacity-75 pt-green pt-bg-green" style="height: 4px">
                    </div>
                    <div class="p-3">
                        <img src="{{$product->collection_name ? $product->getFirstMediaUrl($product->collection_name) : asset('assets/img/soil_sample_product_img.jpg')}}" class="img-fluid c44-w-fill"
                            style="max-height: 450px"
                             alt="{{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}">
                    </div>
                    <div class="card-product-body p-3 pt-0">
                        <div class="card-product-body-overlay">
                            <p class="">
                                {{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}
                            </p>
                            @if($product->product_price)
                                <p>Price: {{$product->product_price}} Eur</p>
                            @endif
                            <div class="card-product-view-btn">
                                <a href="{{route('site.product.show',[session()->get('language'),$product->product_slug])}}"
                                   class="btn btn-hover-arrow btn-lg my-2 rounded-1 fs-20 m-auto pt-bg-green"
                                   style="width: 220px; height: 50px;font-weight: 400;">
                                    <span class="text-black text-capitalize">{{ __('messages.see_more') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <h2 class="fs-50 c44-font-bold c44-dark-blue">{{ __('messages.no_products') }} <span class="c44-red">{{$search}}</span></h2>
            </div>
        @endforelse
            @if($products->total() > 0 && $products->count() < $products->total())
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button wire:click="loadMore" class="btn btn-danger btn-hover-arrow btn-lg my-4 rounded-1" style="width: 230px; height: 53px; font-size: 24px;background-color: var(--c44-red)">
                        <span class="text-capitalize">{{ __('messages.load_more') }}</span>
                    </button>
                </div>
            @endif
    </div>
</div>
