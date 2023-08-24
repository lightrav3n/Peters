@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Product Relations</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Products.index')}}">Products</a></li>
                            <li class="breadcrumb-item active">Product Relations</li>
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
                    <!--Begin::table card-->
                    <div class="card table-card table-nowrap mb-3 mb-lg-5">
                        <div class="card-header">
                            <h5 class="mb-0">Product List</h5>
                        </div>
                        <div class="table-responsive table-card table-nowrap">
                            <table class="table align-middle table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Related with</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="{{$product->collection_name ? $product->getFirstMedia($product->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                                         class="avatar sm rounded-circle" alt="">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{$product->product_name}}</h6>
                                                    <small class="text-body-secondary">{{$product->category->name}}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($product->relatedProducts as $related)
                                                <span class="badge bg-success fs-6">{{$related->product_name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="{{route('Products.related.edit', $product)}}" data-tippy-content="Edit Relations">
                                                    <span class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ends::table card-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
