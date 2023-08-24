@extends('layouts.main')
@section('title', $policy->section_name.' Peters Bodenprobetehnik Company')
@section('content')
    <main class="main-content" id="main-content">
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
            <img src="{{asset('assets/img/contact/peters_bodenprobetehnik_contact_header.jpg')}}" alt=""
                 class="bg-image bg-cover">
            <div class="container position-relative my-12">
                <div class="row mt-6 mt-lg-12 ms-0 ms-lg-2">
                    <div class="col-11 col-md-8 col-lg-6 text-white p-3 p-sm-0">
                        <!--:Title:-->
                        <div class="headline">
                            <h1 class="text-left text-capitalize fs-50">
                                {{$policy->section_name}}
                            </h1>
                        </div>
                        <div class="sub-headline my-4 my-lg-5 fs-20">
                            Sicheres, schnelles und zuverlässiges Bodenprobennehmen ist das Fachgebiet von
                            Bodenprobetechnik Peters. Das Unternehmen befindet sich im Dorf Badbergen im norddeutschen
                            Bundesland Niedersachsen, zwischen den Städten Osnabrück und Bremen, in unmittelbarer Nähe
                            der Autobahn A1.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row">
                    <div class="col-12">
                        <div>
                            {!! $policy->page_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
