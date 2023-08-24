@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Order Details</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('cms.orders.index')}}">Orders</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
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
            <div class="card table-card table-nowrap overflow-hidden card-table">
                <div class="row">

                    <div class="col-12">
                        <!--Table-->
                        <div class="table-responsive mb-4">
                            <table class="table mb-4">
                                <thead class="small">
                                <tr>
                                    <th style="min-width: 300px;">Products</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    @foreach($product->product as $item)
                                        <tr class="align-middle">
                                            <td>{{$item->product_name}}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-borderless mb-4">
                                <tbody>
                                    <tr class="align-middle">
                                        <td>
                                            Client Name: {{$clientDetails['clientName']}}
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>
                                            Client Email: {{$clientDetails['clientEmail']}}
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>
                                            Order Date: {{$clientDetails['date']->format('d/m/Y H:i')}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Table end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//Page content End//-->
@endsection
@section('js')

@endsection
