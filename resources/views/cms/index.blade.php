@extends('layouts.cms')
@section('page-class','page-content d-flex flex-column flex-row-fluid')
@section('content')
    <!--//Page content//-->
    <div class="content px-3 px-lg-6 pt-3 pb-0 d-flex flex-column-fluid position-relative">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-sm-6 col-xl-3 mb-3 mb-lg-5">
                    <div class="card table-card table-nowrap">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Most Visited Products</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table">
                                <thead class="small bg-body text-uppercase text-body-secondary">
                                <tr>
                                    <th>Product</th>
                                    <th class="text-end">Views</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topProducts as $product)
                                    <tr>
                                        <td>{{$product->product_name}}</td>
                                        <td class="text-end">{{$product->views}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 mb-3 mb-lg-5">
                    <div class="card table-card table-nowrap">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Most Views News</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table">
                                <thead class="small bg-body text-uppercase text-body-secondary">
                                <tr>
                                    <th>Title</th>
                                    <th class="text-end">Views</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topNews as $news)
                                    <tr>
                                        <td>{{$news->title}}</td>
                                        <td class="text-end">{{$news->views}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-lg-5">
                    <div class="card table-card table-nowrap">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Latest Orders</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table">
                                <thead class="small bg-body text-uppercase text-body-secondary">
                                <tr>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th class="text-end">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->client_name}}</td>
                                        <td>{{$order->client_email}}</td>
                                        <td class="text-end">{{$order->created_at->format('d/m/Y H:i')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//Page content End//-->

    <!--//Page-footer//-->
    <footer class="pb-3 pb-lg-5 px-3 px-lg-6">
        <div class="container-fluid px-0">
                <span class="d-block lh-sm small text-muted text-end">&copy;
                  <script>
                    document.write(new Date().getFullYear())
                  </script>. Copyright
                </span>
        </div>
    </footer>
    <!--/.Page Footer End-->
@endsection
@section('js')
    <script>
        $("#generateSitemap").on('click', function (e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {},
                type: 'POST',
                url: '#'
            });
        })
    </script>
@endsection
