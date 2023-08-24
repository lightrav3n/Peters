@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Orders List</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0 pe-3 flex-grow-1 text-truncate">Orders List</h5>
                </div>
                <div class="table-responsive">
                    <table id="productsTable" class="table align-middle mb-0">
                        <!--::begin table head-->
                        <thead class="bg-body text-muted small text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Client Name</th>
                            <th class="text-end d-none d-lg-table-cell">email</th>
                            <th class="text-end">date</th>
                            <th class="text-end" data-sortable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->client_name}}</td>
                                <td class="text-end">{{$order->client_email}}</td>
                                <td class="text-end">{{$order->created_at->format('d/m/Y H:i')}}</td>
                                <td class="text-end">
                                    <a href="{{route('cms.orders.details', $order->order_uid)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      preview
                                      </span>
                                    </a>
                                    <form class="d-inline" method="post" action="{{route('cms.orders.destroy', $order)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm px-0 btn-danger" onclick="return confirm('Sure to delete?')">
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
    </script>
@endsection
