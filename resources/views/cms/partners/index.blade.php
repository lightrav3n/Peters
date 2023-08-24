@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Partners</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Partners</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{route('Partners.create')}}" class="btn btn-success">
                    <span class="material-symbols-rounded align-middle me-1">
                      add
                      </span>Partner</a>
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
                    <h5 class="mb-0 pe-3 flex-grow-1 text-truncate">Partners list</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <!--::begin table head-->
                        <thead class="bg-body text-muted small text-uppercase">
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td>{{$partner->name}}</td>
                                <td>
                                    <img src="{{$partner->getFirstMediaUrl($partner->collection_name)}}"
                                         class="img-fluid rounded" alt=""
                                         style="max-height: 80px">
                                </td>
                                <td>{{$partner->website}}</td>
                                <td class="text-end">
                                    <a href="{{route('Partners.edit', $partner)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      edit
                                      </span>
                                    </a>
                                    <form class="d-inline" method="post" action="{{route('Partners.destroy', $partner)}}">
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

@endsection
