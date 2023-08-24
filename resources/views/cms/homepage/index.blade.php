@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Home page texts</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Home Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//Page Toolbar End//-->
    <!--//Page content//-->
    <div class="content pt-3 px-3 px-lg-6">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="card h-auto">
                    <div class="card-header">
                        <h5 class="mb-1">Homepage Header Texts</h5>
                    </div>
                    @foreach($headlines as $language)
                        <form action="{{route('cms.homepagehl.update')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <input type="hidden" name="language" value="{{$language->name}}">
                                <div class="input-group">
                                    <span class="input-group-text">{{$language->display_name}}</span>
                                    <textarea class="form-control" aria-label="With textarea" name="page_content">{!! $language->privacyPolicy ? $language->privacyPolicy->page_content : '' !!}</textarea>
                                    <button type="submit" class="btn btn-primary input-group-text">Update</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('cms.homepage.productcards') }}" class="btn btn-secondary btn mb-2 me-1">Product Categories Cards</a>
                <a href="{{ route('cms.homepage.productcards2') }}" class="btn btn-secondary btn mb-2 me-1">Product Cards 2</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="card h-auto">
                    <div class="card-header">
                        <h5 class="mb-1">Homepage Expertise Texts</h5>
                    </div>
                    @foreach($expertises as $expertise)
                        <form action="{{route('cms.homepage.expertise.update')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <input type="hidden" name="language" value="{{$expertise->name}}">
                                <div class="input-group">
                                    <span class="input-group-text">{{$expertise->display_name}}</span>
                                    <textarea class="form-control" aria-label="With textarea" name="page_content">{!! $expertise->privacyPolicy ? $expertise->privacyPolicy->page_content : '' !!}</textarea>
                                    <button type="submit" class="btn btn-primary input-group-text">Update</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--//Page content End//-->
@endsection
@section('js')

@endsection
