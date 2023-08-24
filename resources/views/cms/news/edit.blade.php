@extends('layouts.cms')
@section('css')
    <link rel="stylesheet" href="{{asset('cms/assets/vendor/css/daterangepicker.css')}}">
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
                    <h3 class="mb-2">Edit Activities</h3>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('News.index')}}">Activities and News</a></li>
                            <li class="breadcrumb-item active">Edit Activities</li>
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
                    <h5 class="mb-1">News Edit</h5>
                </div>
                <div class="card-body">
                    <form id="formtest" class="row g-3" method="post" action="{{route('News.update', $activity)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-3">
                            <label for="category" class="form-label">News Category</label>
                            <select id="category" class="form-control" name="category" required>
                                @foreach($newsCategories as $category)
                                    <option value="{{$category->id}}" @if($activity->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="language" class="form-label">News Language</label>
                            <select id="language" class="form-control" name="language" required>
                                <option value="1" selected disabled>Select Category</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->name}}" @if($activity->language == $language->name) selected @endif>{{$language->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="singleDatePicker" class="form-label">Publish Date</label>
                            <input id="singleDatePicker" class="form-control" type="text" name="publishDate" value="{{$activity->publish_date}}">
                        </div>
                        <div class="col-md-3 pt-6">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Visibility</label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                       @if($activity->visibility == 1)checked="" @else @endif name="visibility">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$activity->title}}">
                        </div>
                        <div class="col-md-12">
                            <label for="shortDescription" class="form-label">Short Description</label>
                            <input type="text" class="form-control" id="shortDescription" name="shortDescription" value="{{$activity->short_description}}">
                        </div>
                        <div class="col-12">
                            <textarea name="description">{!! $activity->description !!}</textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone border-0 bg-body rounded-3 bg-opacity-25">
                                        <div class="fallback">
                                            <input id="posterImage" name="posterImage" type="file" onchange="previewMultiple(event)">
                                            <h4 class="fw-bold text-center">Poster Inage here.</h4>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2">
                                            <div class="border d-flex rounded-3 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="width-8 h-auto rounded-3">
                                                            <img width="150px" height="150px" class="img-fluid rounded-3 block"
                                                                 src="{{$activity->getFirstMediaUrl($activity->poster_image_collection) ? $activity->getFirstMedia($activity->poster_image_collection)->getUrl('thumb340') : asset('assets/img/soil_sample_product_img.jpg')}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#!" class="btn btn-sm btn-danger me-3" onclick="this.parentNode.remove()">Delete</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone2 border-0 bg-body rounded-3 bg-opacity-25">
                                        <div class="fallback">
                                            <input id="galleryImages" name="galleryImages[]" type="file" multiple="multiple" onchange="previewMultiple2(event)">
                                            <h4 class="fw-bold text-center">Gallery Inages here.</h4>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0 sortable" id="dropzone-preview2" data-sortable-id="0" aria-dropeffect="move">
                                        @if($activity->gallery_collection)
                                            @foreach($activity->getMedia($activity->gallery_collection) as $media)
                                                <li class="mt-2" id="item-{{$media->id}}" data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">
                                                    <div class="border d-flex rounded-3 align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="width-8 h-auto rounded-3">
                                                                    <img width="150px" height="150px" class="img-fluid rounded-3 block"
                                                                         src="{{$media->getUrl('thumb340')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#!" id="{{$media->id}}" class="btn btn-sm btn-danger me-3 deleteMediaGallery">Delete</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
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
                                        @if($activity->local_video)
                                                <li class="mt-2">
                                                    <div class="border d-flex rounded-3 align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="width-8 h-auto rounded-3">
                                                                    <video controls width="300px" height="300px" class="img-fluid rounded-3 block"
                                                                           src="{{$activity->getFirstMedia($activity->local_video)->getUrl()}}"/></video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#!" class="btn btn-sm btn-danger me-3" onclick="this.parentNode.remove()">Delete</a>
                                                    </div>
                                                </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="embedVideo" class="form-label">Embed Video</label>
                            <input type="text" class="form-control" id="embedVideo" name="embedVideo" value="{{$activity->embed_video}}">
                        </div>
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Update</button>
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

        function previewMultiple(event){
            var poster = document.getElementById("posterImage");
            var counter = poster.files.length;
            for(i = 0; i < counter; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("dropzone-preview").innerHTML += '<li class="mt-2">'+
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
        function previewMultiple2(event){
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
    <script src="{{asset('cms/assets/vendor/moment.min.js')}}"></script>
    <script src="{{asset('cms/assets/vendor/daterangepicker.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#singleDatePicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                maxYear: parseInt(moment().format('YYYY'),10),
                locale: {
                    format: 'YYYY-MM-DD'
                },
            });
        });
        $(".sortable").sortable({
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // POST to server using $.post or $.ajax
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: '{{route('News.mediaOrder')}}'
                });
            }
        });
        $(".deleteMediaGallery").on('click', function (e){
            e.preventDefault();
            this.parentNode.remove();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    mediaId: this.id
                },
                type: 'POST',
                url: '{{route('News.deleteGalleryMedia')}}'
            });
        })
    </script>
@endsection
