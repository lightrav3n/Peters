@extends('layouts.main')
@section('title', $activity->title)
@section('meta_url', URL::current())
@section('meta_title', $activity->title)
@section('meta_description', $activity->short_description)
@section('meta_image', $activity->getFirstMediaUrl($activity->poster_image_collection) ? $activity->getFirstMedia($activity->poster_image_collection)->getUrl('thumb340') : asset('assets/img/soil_sample_product_img.jpg'))
@section('meta_image_sm', $activity->getFirstMediaUrl($activity->poster_image_collection) ? $activity->getFirstMedia($activity->poster_image_collection)->getUrl('thumb100') : asset('assets/img/soil_sample_product_img.jpg'))
@section('css')
    <link href="{{asset('assets/vendor/videojs/video-js.css')}}" rel="stylesheet" />
    <style>
        .vjs-poster {
            border-radius: 15px;
        }
        .video-js {
            background-color: #000000;
            width: 100%;
        }
        .video-js .vjs-big-play-button {
            top: 45%;
            margin: 0 auto;
            position: inherit;
        }
        .video-js .vjs-tech {
            border-radius: 15px 15px 0 0;
            -webkit-box-shadow: 0px 0px 30px 5px rgb(0 0 0 / 75%);
            -moz-box-shadow: 0px 0px 30px 5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 30px 5px rgb(0 0 0 / 75%);
        }
        @media (max-width: 1200px) {
            .video-js {
                max-height: 70vh; } }
        @media (max-width: 991px) {
            .video-js {
                max-height: 60vh;
            } }
        @media (max-width: 767px) {
            .video-js {
                max-height: 320px;
            } }
    </style>
@endsection
@section('content')
    <main>
        <!--::Start Hero Section::-->
        <section id="article-header" class="position-relative overflow-hidden text-white pt-6 pt-lg-12 z-0 pt-bg-light-blue">
            <div class="container position-relative mt-12 pb-2 pb-md-6">
                <div class="row mt-12 justify-content-center">
                    <article class="row align-items-center">
                        <div class="col-12 col-lg-6 me-auto mb-7 mb-lg-0">
                            @if($activity->local_video)
                                <video
                                    id="localVideo"
                                    class="video-js rounded-1 my-4"
                                    controls
                                    preload="auto"
                                    width="auto"
                                    height="500"
                                    poster="{{$activity->getFirstMediaUrl($activity->poster_image_collection) ?: asset('assets/img/soil_sample_product_img.jpg')}}"
                                    data-setup="{}">
                                    <source src="{{$activity->getFirstMedia($activity->local_video)->getUrl()}}" type="video/mp4" />
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            @else
                                <div class="rounded-1">
                                    <img src="{{$activity->getFirstMediaUrl($activity->poster_image_collection) ?: asset('assets/img/soil_sample_product_img.jpg')}}"
                                         class="img-fluid rounded-1 c44-w-fill h-100"
                                         alt="{{$activity->title}}"
                                         title="{{$activity->title}}">
                                </div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <div class="d-flex justify-content-between w-100">
                                <span class="badge fw-bold text-white rounded-0 px-3 c44-bg-red">{{$activity->category->title}}</span>
                            </div>
                            <div>
                                <h2 class="my-4 display-5">
                                    {{$activity->title}}
                                </h2>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="position-relative border-bottom">
            <div class="container py-6 py-lg-8">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <article class="article mb-9">
                           {!! $activity->description !!}
                        </article>
                        <!--/.article-->
                    </div>
                    <div class="col-12 col-lg-6">
                        @if( $activity->embed_video)
                            <div class="w-100">
                                {!! $activity->embed_video !!}
                            </div>
                        @else
                            <div class="rounded-1">
                                <img src="{{$activity->getFirstMediaUrl($activity->poster_image_collection) ?: asset('assets/img/soil_sample_product_img.jpg')}}"
                                     class="img-fluid rounded-1 c44-w-fill h-100"
                                     alt="{{$activity->title}}"
                                     title="{{$activity->title}}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('assets/vendor/videojs/video.min.js')}}"></script>
    <script>
        $('article img').addClass('img-fluid').css('max-height', '900').css('width','-webkit-fill-available').css('height','-webkit-fill-available');
        @if($activity->local_video)
        videojs("localVideo").ready(function(){
            this.volume(0.4);
        });
        @endif
        $(document).ready(function(){
            if (isMobile()) {
                $('iframe').addClass('w-100');
            }
        });
    </script>
@endsection
