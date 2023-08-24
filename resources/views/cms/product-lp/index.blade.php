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
                    <h3 class="mb-2">Products Landing Page</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products LP</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="row">
                @foreach($cards as $card)
                    <div class="col-4">
                        <div class="card mb-3 mb-lg-5 card-body">
                            <p>Card for language {{$card->language}}</p>
                            <form id="formtest" class="row g-3" method="post" action="{{route('cms.productlp.update', $card)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$card->title}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="text" class="form-label">Text</label>
                                    <textarea class="form-control" aria-label="With textarea" name="text">{!! $card->text !!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="aos_text" class="form-label">AOS Text Slide</label>
                                    <input type="text" class="form-control" id="role" name="aos_text" value="{{$card->aos_text}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="link1" class="form-label">Link 1</label>
                                    <input type="text" class="form-control" id="link1" name="link1" value="{{$card->link1}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="link1_text" class="form-label">Link 1 Text</label>
                                    <input type="text" class="form-control" id="link1_text" name="link1_text" value="{{$card->link1_text}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="link2" class="form-label">Link 2</label>
                                    <input type="text" class="form-control" id="link2" name="link2" value="{{$card->link2}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="link2_text" class="form-label">Link 2 Text</label>
                                    <input type="text" class="form-control" id="link2_text" name="link2_text" value="{{$card->link2_text}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropzone border-0 bg-body rounded-3 bg-opacity-25">
                                                <div class="fallback">
                                                    <input name="cardImage" type="file">
                                                    <h4 class="fw-bold text-center">Picture</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @foreach($card->getMedia($card->collection_name) as $media)
                                        <input type="hidden" name="mediaId" value="{{$media->id}}">
                                    @endforeach
                                    <img width="150px" height="150px" class="img-fluid rounded-3 block" src="{{$card->getFirstMediaUrl($card->collection_name)}}" />
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropzone border-0 bg-body rounded-3 bg-opacity-25">
                                                <div class="fallback">
                                                    <input name="sideImage" type="file">
                                                    <h4 class="fw-bold text-center">Slide in Picture</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @foreach($card->getMedia($card->collection_slide) as $media)
                                        <input type="hidden" name="mediaIdSlide" value="{{$media->id}}">
                                    @endforeach
                                    <img width="150px" height="400px" class="rounded-3 block" src="{{$card->getFirstMediaUrl($card->collection_slide)}}" />
                                </div>
                                <div class="col-md-12">
                                    <label for="aos" class="form-label">AOS Slide From</label>
                                    <input type="text" class="form-control" id="aos" name="aos" value="{{$card->aos_slide_from}}">
                                </div>
                                <div class="col-12 mt-5">
                                    <button id="upload" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
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
