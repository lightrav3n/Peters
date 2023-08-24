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
                    <h3 class="mb-2">Edit team member</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Team.index')}}">Team</a></li>
                            <li class="breadcrumb-item active">Edit team member</li>
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
                <div class="card-body">
                    <form id="formtest" class="row g-3" method="post" action="{{route('Team.update', $team)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$team->name}}">
                        </div>
                        <div class="col-md-12">
                            <label for="role" class="form-label">Position</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{$team->role}}">
                        </div>
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
