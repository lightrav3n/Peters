@extends('layouts.cms')
@section('css')
    <!--Choices css-->
    <link rel="stylesheet" href="{{asset('cms/assets/vendor/css/choices.min.css')}}">
@endsection
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Edit Relations</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Products.index')}}">Products</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('Products.related.index')}}">Product Relations</a></li>
                            <li class="breadcrumb-item active">Edit Relations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body mb-3 mb-lg-5">
                        <div class="d-flex mb-4">
                            <div class="me-3 flex-grow-1">
                                <h3 class="mb-1">{{$product->product_name}}</h3>
                                <p class="mb-0 text-body-secondary">
                                    {{$product->descriptions->first() ? $product->descriptions->first()->product_short_description : ''}}
                                </p>
                            </div>
                            <div>
                                <span class="badge rounded-pill small flex-shrink-0 {{$product->visibility == '1' ? 'bg-success' : 'bg-danger'}}">
                                     {{$product->visibility == '1' ? 'Active' : 'Inactive'}}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start mb-4">
                            <!--Members-->
                            <div class="avatar-group me-3 me-sm-4">
                                <img src="{{$product->collection_name ? $product->getFirstMedia($product->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                     class="img-fluid rounded" alt=""
                                     style="max-height: 100px">
                            </div>
                            <div>
                                {!! $product->descriptions->first() ? $product->descriptions->first()->product_description : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-3 mb-lg-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 me-3">Available Products for relations with {{$product->product_name}}</h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @foreach($relatable as $option)
                                    <li class="list-group-item d-flex align-items-center px-4">
                                        <img src="{{$option->collection_name ? $option->getFirstMedia($option->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                             class="width-60 h-auto flex-shrink-0 me-3" alt="">
                                        <div class="flex-grow-1 text-reset d-block overflow-hidden">
                                            <h6 class="mb-0 text-truncate">{{$option->product_name}}</h6>
                                            <small class="text-body-secondary">{{$option->category->name}}</small>
                                        </div>
                                        <div class="flex-shrink-0 dropstart ps-3">
                                            <form class="d-inline" method="post" action="{{route('Products.related.attach',[$product, $option])}}">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-success">Add to related</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-3 mb-lg-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 me-3">Related to {{$product->product_name}}</h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @foreach($related as $item)
                                    <li class="list-group-item d-flex align-items-center px-4">
                                        <img src="{{$item->relatedTo->collection_name ? $item->relatedTo->getFirstMedia($item->relatedTo->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                             class="width-60 h-auto flex-shrink-0 me-3" alt="">
                                        <a class="flex-grow-1 text-reset d-block overflow-hidden" href="#!">
                                            <h6 class="mb-0 text-truncate">{{$item->relatedTo->product_name}}</h6>
                                            <small class="text-body-secondary">{{$item->relatedTo->category->name}}</small>
                                        </a>
                                        <div class="flex-shrink-0 dropstart ps-3">
                                            <form class="d-inline" method="post" action="{{route('Products.related.detach',[$product, $item->relatedTo])}}">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Remove related</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
