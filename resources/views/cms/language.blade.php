@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Languages list</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Languages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6">
        <div class="row">
            <div class="col-md-5 col-lg-4 mb-3 mb-lg-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <form class="row col-12 align-items-center" method="post" action="#">
                            @csrf
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="title" name="name" placeholder="Enter product category name">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Add new</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <!--Files list-->
                        <ul class="list-group list-group-flush sortable" data-sortable-id="0" aria-dropeffect="move">
                            @foreach($product_categories as $category)
                                <li class="list-group-item d-flex align-items-center px-4" id="item-{{$category->id}}"
                                    data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">
                                    <a class="flex-grow-1 text-reset d-block overflow-hidden" href="#!">
                                        <h6 class="mb-0 text-truncate">{{$category->name}}</h6>
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
                    url: '#'
                });
            }
        });
        $(".deleteCategory").on('click', function (e){
            e.preventDefault();
            if(confirm('Are you shure to delete?')){
                this.closest("li").remove();
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
                    url: '#'
                });
            }
        })
    </script>
@endsection
