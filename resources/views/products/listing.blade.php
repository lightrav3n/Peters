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
                                {{$categoryDescription->title}}
                            </h1>
                        </div>
                        <div class="sub-headline my-4 my-lg-5 fs-20">
                            {{$categoryDescription->text}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            @livewire('product-list', ['slugId' => $slugId])
        </section>
    </main>
@endsection
