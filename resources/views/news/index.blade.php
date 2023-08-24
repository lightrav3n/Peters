@extends('layouts.main')
@section('title', 'Peters Bodenprobetehnik Company Latest News')
@section('css')
    <style>
        .mh-300px {
            max-height: 300px;
        }

        .c44-grid-cards {
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        }

        @media only screen and (max-width: 768px) {
            .c44-grid-cards {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }
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
    <main>
        <!--::Start Hero Section::-->
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
        <img src="{{asset('assets/img/contact/peters_bodenprobetehnik_contact_header.jpg')}}" alt=""
                 class="bg-image bg-cover">
            <div class="container position-relative mt-12 pb-2 pb-md-6">
                <div class="row mt-12">
                    <div class="col-11 col-md-8 col-lg-6 text-white p-3">
                        <!--:Title:-->
                        <div class="headline">
                            <h1 class="text-left text-capitalize">
                                {{ __('menu.news') }}
                            </h1>
                        </div>
                        <!--:Subtitle:-->
                        <div class="sub-headline my-5">
                        Hier finden Sie unsere neuesten Weiterentwicklungen und Hilfestellungen.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ News list Section-->
        @livewire('news-list')
    </main>
@endsection
@section('js')
@endsection
