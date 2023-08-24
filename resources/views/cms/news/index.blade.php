@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">News and Media</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">News and Media</li>
                        </ol>
                    </nav>
                </div>
                @if($newsCategories->count())
                    <div class="col-md-4 text-md-end">
                        <a href="{{route('News.create')}}" class="btn btn-success">
                        <span class="material-symbols-rounded align-middle me-1">
                          add
                          </span>New Post</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--//Page Toolbar End//-->
    <!--//Page content//-->
    <div class="content pt-3 px-3 px-lg-6">
        <div class="row">
            <div class="col-md-5 col-lg-4 mb-3 mb-lg-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <form class="row col-12 align-items-center" method="post" action="{{route('News.category.add')}}">
                            @csrf
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="title" name="name" placeholder="News Categoty Name">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <!--Files list-->
                        <ul class="list-group list-group-flush sortable" data-sortable-id="0" aria-dropeffect="move">
                            @foreach($newsCategories as $category)
                                <li class="list-group-item d-flex align-items-center px-4" id="item-{{$category->id}}"
                                    data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">
                                    <a class="flex-grow-1 text-reset d-block overflow-hidden" href="#!">
                                        <h6 class="mb-0 text-truncate">{{$category->title}}</h6>
                                    </a>
                                    <div class="flex-shrink-0 dropstart ps-3">
                                        <a href="#!" id="{{$category->id}}" class="btn btn-danger btn-sm deleteCategory">Delete</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card table-card table-nowrap overflow-hidden card-table">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0 pe-3 flex-grow-1 text-truncate">News List</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <!--::begin table head-->
                        <thead class="bg-body text-muted small text-uppercase">
                        <tr>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Language</th>
                            <th class="text-end">Date</th>
                            <th class="text-end">Visibility</th>
                            <th class="text-end">Views</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="width-100 h-auto me-3">
                                            <img src="{{$activity->getFirstMediaUrl($activity->poster_image_collection) ? $activity->getFirstMedia($activity->poster_image_collection)->getUrl('thumb100') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                                 class="img-fluid rounded" alt=""
                                                 style="max-height: 100px">
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="h6 mb-1">{{$activity->title}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$activity->category->title ?? 'no title'}}</td>
                                <td>{{$activity->language ?? 'no lang'}}</td>
                                <td class="text-end">{{$activity->publish_date}}</td>
                                <td class="text-end">
                                    <span class="badge badge-pill bg-tint-success {{$activity->visibility == '1' ? 'text-success' : 'text-danger'}}">
                                    {{$activity->visibility == '1' ? 'Active' : 'Inactive'}}</span>
                                </td>
                                <td class="text-end">{{$activity->views}}</td>
                                <td class="text-end">
                                    <a href="{{route('News.duplicate', $activity)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      group_add
                                      </span>
                                    </a>
                                    <a href="{{route('News.edit', $activity)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      edit
                                      </span>
                                    </a>
                                    <form class="d-inline" method="post" action="{{route('News.destroy', $activity)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm px-0 btn-danger" onclick="return confirm('Are you shure?')">
                                            <span class="material-symbols-rounded align-middle">
                                      delete
                                      </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--//Page content End//-->
@endsection
@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
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
                    url: '{{route('News.category.order')}}'
                });
            }
        });
        $(".deleteCategory").on('click', function (e){
            e.preventDefault();
            if(confirm('Shure you want to delete it?')){
                this.closest("li").remove();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // POST to server using $.post or $.ajax
                $.ajax({
                    data: {
                        categoryId: this.id
                    },
                    type: 'POST',
                    url: '{{route('News.category.delete')}}'
                });
            }
        })
    </script>
@endsection
