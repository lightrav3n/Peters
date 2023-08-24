@extends('layouts.main')
@section('title', 'Revolutionize Soil Sampling with Cutting-Edge Technology Peters Bodenprobetehnik Company')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <main>
        <!--::Start Hero Section::-->
        <section class="position-relative overflow-hidden text-white pt-12 z-0">
            <img src="{{asset('assets/img/products/soil_sampling_products_header.jpg')}}" alt=""
                 class="bg-image">
            <div class="container position-relative mt-4 mt-lg-12 pb-2 pb-md-6">
                <div class="row mt-lg-12">
                    <div class="col-11 col-md-8 col-lg-6 text-white p-3 p-sm-0">
                        <!--:Title:-->
                        <div class="headline">
                            <h1 class="text-left text-capitalize">
                            Probeentnahmegeräte mit neuester Technik
                            </h1>
                        </div>
                        <!--:Subtitle:-->
                        <div class="sub-headline my-5">
                        Wir bieten Ihnen Maschinen für eine präzise und zuverlässige Bodenbeprobung. Entwickelt und gebaut, um auch den rauesten Bedingungen standzuhalten.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @foreach($cards as $card)
            <section class="overflow-hidden py-6 py-lg-10" @if($loop->even)style="background-color: #F2F5F6;" @endif>
                <div class="container position-relative z-1">
                    <div class="row position-relative justify-content-between">
                        <div class="position-absolute h-100 align-items-center d-none d-lg-flex" data-aos="{{$card->aos_slide_from}}"
                             data-aos-delay="150" @if($loop->even)style="left: 100%" @else style="left: -10%" @endif>
                            <img src="{{$card->getFirstMediaUrl($card->collection_slide)}}"
                                 class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-6 me-lg-auto mb-4 mb-lg-0 pe-4">
                            <div class="position-relative" data-aos="{{$card->aos_text}}" data-aos-delay="150">
                                <h2 class="mb-6 fs-50 c44-font-bold c44-dark-blue">{{$card->title}}
                                    <span class="pt-light-blue"></span></h2>
                                {!! $card->text !!}
                                <div class="d-flex gap-3">
                                    <a href="{{url(session()->get('language').$card->link1)}}"
                                       class="btn btn-hover-arrow btn-lg my-4 rounded-1 btn-outline-dark fs-20"
                                       style="width: 230px; height: 53px; background-color: transparent">
                                        <span style="color: var(--c44-dark-blue)">{{$card->link1_text}}</span>
                                    </a>
                                    <a href="{{url(session()->get('language').$card->link2)}}"
                                       class="btn btn-danger btn-hover-arrow btn-lg my-4 rounded-1 fs-20"
                                       style="width: 320px; height: 53px; background-color: var(--pt-red)">
                                        <span>{{$card->link2_text}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex py-2 @if($loop->even) order-last order-lg-first @endif">
                            <img src="{{$card->getFirstMediaUrl($card->collection_name)}}"
                                 class="img-fluid rounded-2 c44-w-fill"/>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </main>
@endsection
