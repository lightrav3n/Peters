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
                    <h3 class="mb-2">Add to team</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Team.index')}}">Team</a></li>
                            <li class="breadcrumb-item active">Add team member</li>
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
                <div class="card-body">
                    <form id="formtest" class="row g-3" method="post" action="{{route('Team.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="role" class="form-label">Position</label>
                            <input type="text" class="form-control" id="role" name="role">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone border-0 bg-body rounded-3 bg-opacity-25">
                                        <div class="fallback">
                                            <input id="posterImage" name="teamImage" type="file" onchange="previewPoster(event)">
                                            <h4 class="fw-bold text-center">Member picture</h4>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function previewPoster(event){
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
    </script>
@endsection
