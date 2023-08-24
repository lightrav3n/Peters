@extends('layouts.cms')
@section('css')
@endsection
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Add Testimonial</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('Testimonials.index')}}">Testimonials</a></li>
                            <li class="breadcrumb-item active">Add Testimonial</li>
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
                    <form id="formtest" class="row g-3" method="post" action="{{route('Testimonials.store')}}">
                        @csrf
                        @method('POST')
                        <div class="col-md-6">
                            <label for="name" class="form-label">Person Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="additional" class="form-label">Additional Fieln</label>
                            <input type="text" class="form-control" id="additional" name="additional">
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">Comment</span>
                                <textarea class="form-control" aria-label="write comment" required name="comment"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <button id="upload" type="submit" class="btn btn-primary">Add Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
