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
                    <h3 class="mb-2">Add new product</h3>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Products.index')}}">Products</a></li>
                            <li class="breadcrumb-item active">Add new</li>
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
            <div class="card h-auto">
                <div class="card-header">
                    <h5 class="mb-1">Product Details</h5>
                </div>
                <div class="card-body">
                    <form id="formtest" class="row g-3" method="post" action="{{route('Products.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-md-6">
                            <label for="title" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="col-md-2">
                            <label for="product_category" class="form-label">Product Category</label>
                            <select id="product_category" class="form-control" name="product_category" required>
                                <option value="" selected disabled>Select Product Category</option>
                                @foreach($product_categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="price" class="form-label">Product price (optional)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" step="0.1" id="price" name="product_price">
                                <span class="input-group-text">Eur</span>
                            </div>
                        </div>
                        <div class="col-md-1 my-5 mx-5">
                            <label for="flexSwitchCheckChecked" class="form-label">Product visibility</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="" name="visibility">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Visible</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone2 border-0 bg-body rounded-3 bg-opacity-25">
                                        <div class="fallback">
                                            <input id="galleryImages" name="galleryImages[]" type="file" multiple="multiple" onchange="previewGallery(event)">
                                            <h4 class="fw-bold text-center">Product Pictures</h4>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0" id="dropzone-preview2">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border-0 bg-body rounded-3 bg-opacity-25">
                                        <div class="fallback">
                                            <input id="localVideo" name="localVideo" type="file" onchange="previewVideo(event)">
                                            <h4 class="fw-bold text-center">Local Video here.</h4>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0" id="previewVideo">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="embedVideo" class="form-label">Embed Video</label>
                            <input type="text" class="form-control" id="embedVideo" name="embedVideo">
                        </div>
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Add product</button>
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
        function previewGallery(event){
            var poster = document.getElementById("galleryImages");
            var counter = poster.files.length;
            for(i = 0; i < counter; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("dropzone-preview2").innerHTML += '<li class="mt-2">'+
                    '<div class="border d-flex rounded-3 align-items-center justify-content-between">'+
                    '<div class="d-flex align-items-center p-2">'+
                    '<div class="flex-shrink-0 me-3">'+
                    '<div class="width-8 h-auto rounded-3">'+
                    '<img width="150px" height="150px" class="img-fluid rounded-3 block" src="'+urls+'"/>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<a href="#!" class="btn btn-sm btn-danger me-3" onclick="this.parentNode.remove()">Delete</a>'+
                    '</div>'+
                    '</li>';
            }
        }
        function previewVideo(event){
            var video = document.getElementById("localVideo");
            var counter = video.files.length;
            var urls = URL.createObjectURL(video.files[0]);
            document.getElementById("previewVideo").innerHTML += '<li class="mt-2">'+
                '<div class="border d-flex rounded-3 align-items-center justify-content-between">'+
                '<div class="d-flex align-items-center p-2">'+
                '<div class="flex-shrink-0 me-3">'+
                '<div class="width-8 h-auto rounded-3">'+
                '<video controls width="300px" height="300px" class="img-fluid rounded-3 block" src="'+urls+'"/></video>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<a href="#!" class="btn btn-sm btn-danger me-3" onclick="this.parentNode.remove()">Delete</a>'+
                '</div>'+
                '</li>';
        }
    </script>
@endsection
