@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Cookie Policy</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cookie Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12">
                    @foreach($privacy as $language)
                        <div class="card mb-3 mb-lg-5 card-body">
                            <form method="post" action="{{route('cms.cookie.update')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="col-12 my-3">
                                        <label for="description" class="form-label">Description of Cookie Policy page {{$language->display_name}}</label>
                                        <textarea name="page_content" id="description">{!! $language->privacyPolicy ? $language->privacyPolicy->page_content : '' !!}</textarea>
                                    </div>
                                    <input type="hidden" name="language" value="{{$language->name}}">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
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
