@extends('layouts.main')
@section('title', 'About Peters Bodenprobetehnik Company')
@section('content')
    <main>
        <section id="article-header" class="position-relative pt-bg-light-blue">
            <div class="container pt-13 pt-lg-14 pb-4 pb-lg-6 position-relative z-1">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-lg-8">
                        <div class="ratio ratio-16x9">
                            <iframe  data-video-src="mp4:{{asset('assets/videos/Bodenprobetechnik_Peters_GmbH.mp4')}}"
                                width="620" height="347" allowfullscreen="" class="rounded-1"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-white">
                        <h2 class="my-4 fs-36 text-capitalize">
                            {{ $headline->section_name }}
                        </h2>
                        <p class="fs-6">{!! $headline->page_content !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-6 py-lg-11">
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative">
                            <h2 class="text-capitalize">
                                {{$companyProfile->section_name}}
                            </h2>
                            <p class="u-text u-text-2">{!! $companyProfile->page_content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
