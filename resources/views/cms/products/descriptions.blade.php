@extends('layouts.cms')
@section('css')
    <style>
        input#posterImage,input#galleryImages,input#localVideo {
            display: inline-block;
            width: 100%;
            padding: 120px 0 0 0;
            height: 100px;
            overflow: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: url('https://cdn1.iconfinder.com/data/icons/hawcons/32/698394-icon-130-cloud-upload-512.png') center center no-repeat #e4e4e4;
            border-radius: 20px;
            background-size: 60px 60px;
        }
    </style>
@endsection
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Product Descriptions</h3>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Products.index')}}">Products</a></li>
                            <li class="breadcrumb-item active">Product Descriptions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//Page Toolbar End//-->
    <!--//Page content//-->
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Add the Description for product: {{$product->product_name}}</h5>
                </div>
                <div class="card-body">
                    <form id="formtest" class="row g-3" method="post" action="{{route('Products.descriptions.store', $product)}}">
                        @csrf
                        @method('POST')
                        @foreach($languages as $language)
                                <h5 class="mb-1 pt-4">For language: {{$language->display_name}}</h5>
                                <input type="hidden" name="language[{{$language->name}}]" value="{{$language->name}}">
                                <div class="col-12">
                                    <label for="shortDesc-{{$language->name}}" class="form-label">{{$language->display_name}} Product short description</label>
                                    <input type="text" class="form-control" id="shortDesc-{{$language->name}}" name="short_description[{{$language->name}}]"
                                           value="{{$language->descriptions->product_short_description ?? ''}}">
                                </div>
                                <div class="col-12">
                                    <label for="description-{{$language->name}}" class="form-label">{{$language->display_name}} Product description</label>
                                    <textarea name="description[{{$language->name}}]" id="description-{{$language->name}}">
                                        {!! $language->descriptions->product_description ?? '' !!}
                                </textarea>
                                </div>
                        @endforeach
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Add Descriptions</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/yvsq9e6gxptztfc01ktf9oope8udso793dcjm6ttyufe9ze5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection
