@extends('layouts.main')
@section('title', 'Soil Sampling Technology Peters Bodenprobetehnik Company')
@section('css')
    <style>
        .input-icon-group .input-icon-end {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
        }
    </style>
@endsection
@section('content')
    <main class="main-content" id="main-content">
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
            <img src="{{asset('assets/img/soil_sampling.jpg')}}"
                 alt="Soil Sampling Technology Peters Bodenprobetehnik Company"
                 class="bg-image bg-cover">
            <div class="container position-relative my-12">
                <div class="row mt-6 mt-lg-12 ms-0 ms-lg-2">
                    <div class="col-11 col-md-8 col-lg-6 text-white p-3 p-sm-0">
                        <!--:Title:-->
                        <div class="headline">
                            <h1 class="text-left text-capitalize fs-50">
                                Soil Sampling Technology
                            </h1>
                        </div>
                        <div class="sub-headline my-4 my-lg-5 fs-20">
                            Secure, quick and reliable soil sampling is Bodenprobetechnik Peters field of expertise. The
                            company is located in the village of Badbergen in the north German state of Lower Saxony
                            between the cities of Osnabrueck and Bremen, a short distance from the A1 motorway.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-6 py-lg-9 position-relative">
                <div class="row pb-6 d-flex align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-search fs-5 opacity-100" style="color: var(--pt-light-blue)"></i>
                        </span>
                            <input type="text" class="form-control" name="searchProd" value="" placeholder="Search in Products ...">
                            <span class="input-icon-end clearSearch">
                            <i class="bx bx-x fs-5 opacity-100" style="color: var(--pt-red)"></i>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card overflow-hidden hover-lift card-product rounded-1">
                            <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                                <h2 class="py-0">N 2006</h2>
                                <hr class="my-4 opacity-75 pt-green pt-bg-green" style="height: 4px">
                                <a href="#!">
                                    <img src="{{asset('assets/img/products/N2006.jpg')}}" class="img-fluid"
                                         alt="Product">
                                </a>
                            </div>
                            <div class="card-product-body p-3 pt-0">
                                <div class="card-product-body-overlay">
                                  <p class="">
                                      The N 2006 is currently the most modern and fastest soil sampler on the market.
                                  </p>
                                    <span class="card-product-view-btn">
                                      <a href="#!" class="link-underline mb-1 fw-semibold">View
                                        Details</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--:/card product end-->
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card overflow-hidden hover-lift card-product rounded-1">
                            <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                                <h2 class="py-0">N 2012</h2>
                                <hr class="my-4 opacity-75 pt-green pt-bg-green" style="height: 4px">
                                <a href="#!">
                                    <img src="{{asset('assets/img/products/N2012.jpg')}}" class="img-fluid"
                                         alt="Product">
                                </a>
                            </div>
                            <div class="card-product-body p-3 pt-0">
                                <div class="card-product-body-overlay">
                                    <p class="">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                                    <span class="card-product-view-btn">
                                      <a href="#!" class="link-underline mb-1 fw-semibold">View
                                        Details</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--:/card product end-->
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card overflow-hidden hover-lift card-product rounded-1">
                            <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                                <h2 class="py-0">N 2006</h2>
                                <hr class="my-4 opacity-75 pt-green pt-bg-green" style="height: 4px">
                                <a href="#!">
                                    <img src="{{asset('assets/img/products/N2006.jpg')}}" class="img-fluid"
                                         alt="Product">
                                </a>
                            </div>
                            <div class="card-product-body p-3 pt-0">
                                <div class="card-product-body-overlay">
                                    <p class="">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                                    <span class="card-product-view-btn">
                                      <a href="#!" class="link-underline mb-1 fw-semibold">View
                                        Details</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--:/card product end-->
                    <div class="d-grid d-sm-flex justify-content-sm-center">
                        <a href="#" class="btn btn-outline-primary rounded-pill btn-lg btn-hover-text">
                            <span class="btn-hover-label label-default">Load more</span>
                            <span class="btn-hover-label label-hover">Load more</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
