@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">About Us page texts</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">About Us</li>
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
                        <h5 class="mb-1">About Us Texts Header</h5>
                    </div>
                    @foreach($headlineTexts as $language)
                        <div class="card mb-3 mb-lg-5 card-body">
                            <form method="post" action="{{route('cms.about.update')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Header Title for {{$language->display_name}}</label>
                                        <input type="text" class="form-control" id="title" name="hl_title" value="{{$language->privacyPolicy->section_name}}">
                                    </div>
                                    <div class="col-12 my-3">
                                        <label for="description" class="form-label">Header Text for {{$language->display_name}}</label>
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
        <hr>
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="card h-auto">
                    <div class="card-header">
                        <h5 class="mb-1">About Us Company Profile</h5>
                    </div>
                    @foreach($profileTexts as $profile)
                        <div class="card mb-3 mb-lg-5 card-body">
                            <form method="post" action="{{route('cms.company.update')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Company Profile Title for {{$profile->display_name}}</label>
                                        <input type="text" class="form-control" id="title" name="profile_title" value="{{$profile->privacyPolicy->section_name}}">
                                    </div>
                                    <div class="col-12 my-3">
                                        <label for="description" class="form-label">Company Profile Text for {{$profile->display_name}}</label>
                                        <textarea name="page_content" id="description">{!! $profile->privacyPolicy ? $profile->privacyPolicy->page_content : '' !!}</textarea>
                                    </div>
                                    <input type="hidden" name="language" value="{{$profile->name}}">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--//Page content End//-->
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
