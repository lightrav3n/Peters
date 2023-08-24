<section class="position-relative c44-bg-grey">
    <div class="container pt-2 pt-md-6">
        <div class="position-relative z-1">
            <div class="row g-4 d-flex align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-search fs-5 opacity-100" style="color: var(--pt-light-blue)"></i>
                        </span>
                        <input wire:model="search" type="text" class="form-control" name="searchJob" value="" placeholder="Search in News ...">
                        <span class="input-icon-end clearSearch" wire:click="search('')">
                            <i class="bx bx-x fs-5 opacity-100" style="color: var(--pt-red)"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-map fs-5 opacity-100" style="color: var(--pt-light-blue)"></i>
                        </span>
                        <select wire:model="category" class="form-select form-control">
                            <option value="" selected>All News Categories</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-6 pb-10 position-relative">
        <div class="row justify-content-center" wire:loading.class="opacity-25">
            @forelse($news as $item)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-2 mh-300px h-100">
                        <img src="{{$item->getFirstMediaUrl($item->poster_image_collection) ?: asset('assets/img/soil_sample_product_img.jpg')}}"
                             class="img-fluid img-zoom c44-w-fill h-100"
                             alt="{{$item->title}}"
                             title="{{$item->title}}">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-1 px-3">
                            <p class="small">
                                <span class="badge fw-bold text-white rounded-0 px-3 c44-bg-red">{{$item->category->title}}</span>
                            </p>
                            <h5 class="fs-20 mb-3">
                    <span>
                        {{$item->title}}
                    </span>
                            </h5>
                        </div>
                        <a href="{{url(session()->get('language').'/news/'.$item->slug)}}" class="stretched-link"></a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2 class="fs-50 c44-font-bold c44-dark-blue">No matching news for: <span class="c44-red">{{$search}}</span></h2>
                </div>
            @endforelse
            @if($news->total() > 0 && $news->count() < $news->total())
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button wire:click="loadMore" class="btn btn-danger btn-hover-arrow btn-lg my-4 rounded-1" style="width: 230px; height: 53px; font-size: 24px;background-color: var(--c44-red)">
                        <span class="text-capitalize">{{ __('messages.load_more') }}</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>

