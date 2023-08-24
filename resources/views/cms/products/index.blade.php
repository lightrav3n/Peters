@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Products list</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </nav>
                </div>
                @if($product_categories->count())
                    <div class="col-md-4 text-md-end">
                        <a href="{{route('Products.create')}}" class="btn btn-success">
                        <span class="material-symbols-rounded align-middle me-1">
                          add
                          </span>New Product</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--//Page Toolbar End//-->
    <!--//Page content//-->
    <div class="content pt-3 px-3 px-lg-6">
        <div class="row">
            <div class="col-12 col-lg-8 mb-3 mb-lg-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <form class="row col-12 align-items-center" method="post" action="{{route('Products.category.add')}}">
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
                                <form class="d-flex col-12 align-items-center" method="post" action="{{route('Products.category.update', $category)}}">
                                    @csrf
                                    <div class="col-3">
                                        <label for="title" class="form-label">Name De</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$category->name}}">
                                    </div>
                                    <div class="col-3 px-2">
                                        <label for="title" class="form-label">Name En</label>
                                        <input type="text" class="form-control" id="title" name="title_en" value="{{$category->name_en}}">
                                    </div>
                                    <div class="col-3 px-2">
                                        <label for="title" class="form-label">Name Fr</label>
                                        <input type="text" class="form-control" id="title" name="title_fr" value="{{$category->name_fr}}">
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="submit" id="{{$category->id}}" class="btn btn-info btn-sm">Update</button>
                                        <a href="#!" id="{{$category->id}}" class="btn btn-danger btn-sm deleteCategory">Delete</a>
                                    </div>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-3 mb-lg-5">
                <!--//Card start//-->
                <div class="card overflow-hidden">
                    <div class="card-body border-start border-4 border-success d-flex align-items-center justify-content-between">
                        <div class="flex-shrink-0 size-60 bg-primary text-white rounded-pill me-3 d-flex align-items-center justify-content-center">
                        <span class="align-middle material-symbols-rounded fs-1">
                          trending_up
                        </span>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <h5 class="fs-2 d-block fw-bold mb-1">
                                {{$product_categories->count()}}
                            </h5>
                            <h6 class="mb-0 fw-normal">Categories</h6>
                        </div>
                    </div>
                </div>
                <div class="card border-0 overflow-hidden mt-4">
                    <div class="card-body border-start border-4 border-success d-flex align-items-center justify-content-between">
                        <div class="flex-shrink-0 size-60 bg-tint-success text-success rounded-pill me-3 d-flex align-items-center justify-content-center">
                            <span class="align-middle material-symbols-rounded fs-1">
                              attach_money
                            </span>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <h5 class="fs-2 d-block fw-bold mb-1">
                                {{$products->count()}}
                            </h5>
                            <h6 class="mb-0 fw-normal">Products</h6>
                        </div>
                        <div>
                            <h5 class="right">{{$products->sum('product_price')}} Eur</h5>
                            <h6 class="mb-0 fw-normal">Total</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-3 mb-lg-5">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">Products Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{route('Products.related.index')}}" type="button" class="btn btn-primary">Product Relations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card table-card table-nowrap overflow-hidden card-table">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0 pe-3 flex-grow-1 text-truncate">Products list</h5>
                </div>
                <div class="table-responsive">
                    <table id="productsTable" class="table align-middle mb-0">
                        <!--::begin table head-->
                        <thead class="bg-body text-muted small text-uppercase">
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th class="text-end d-none d-lg-table-cell">Price</th>
                            <th class="text-end">Views</th>
                            <th class="text-end">Visible</th>
                            <th class="text-end" data-sortable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-none d-lg-block width-100 h-auto me-3">
                                            <img src="{{$product->collection_name ? $product->getFirstMedia($product->collection_name)->getUrl('thumb') : asset('assets/img/soil_sample_product_img.jpg')}}"
                                                 class="img-fluid rounded" alt=""
                                            style="max-height: 100px">
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="h6 mb-1">{{$product->product_name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td class="text-end d-none d-lg-table-cell"><span class="text-muted">{{$product->product_price ?? 'No Price'}}</span></td>
                                <td class="text-end">{{$product->views}}</td>
                                <td class="text-end">
                                    <span class="badge badge-pill bg-tint-success {{$product->visibility == '1' ? 'text-success' : 'text-danger'}}">
                                    {{$product->visibility == '1' ? 'Active' : 'Inactive'}}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{route('Products.descriptions.create', $product)}}" class="btn btn-light btn-sm">
                                    Description
                                    </a>
                                    <a href="{{route('Products.edit', $product)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      edit
                                      </span>
                                    </a>
                                    <form class="d-inline" method="post" action="{{route('Products.destroy', $product)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm px-0 btn-danger" onclick="return confirm('Shure to delete?')">
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
    <!--Datatables-->
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {
            $("#productsTable").DataTable({
                filter: true,
                pageLength: 50,
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
                    url: '{{route('Products.category.order')}}'
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
                    url: '{{route('Products.category.delete')}}'
                });
            }
        })
    </script>
@endsection
