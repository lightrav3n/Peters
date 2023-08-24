@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Users Settings</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-3 mb-lg-5">
                    <!--//Card start//-->
                    <div class="card overflow-hidden">
                        <div class="card-body border-start border-4 border-primary d-flex align-items-center justify-content-between">
                            <div class="flex-shrink-0 size-60 bg-primary text-white rounded-pill me-3 d-flex align-items-center justify-content-center">
                        <span class="align-middle material-symbols-rounded fs-1">
                          lock_open
                        </span>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h5 class="fs-2 d-block fw-bold mb-1">

                                </h5>
                                <h6 class="mb-0 fw-normal">Roles</h6>
                            </div>
                            <div>
                                <a href="{{route('cms.users.roles')}}" class="btn btn-primary">View +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3 mb-lg-5">
                    <!--//Card start//-->
                    <div class="card border-0 overflow-hidden">
                        <div class="card-body border-start border-4 border-info d-flex align-items-center justify-content-between">
                            <div class="flex-shrink-0 size-60 bg-tint-info text-info rounded-pill me-3 d-flex align-items-center justify-content-center">
                            <span class="align-middle material-symbols-rounded fs-1">
                              supervised_user_circle
                            </span>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h5 class="fs-2 d-block fw-bold mb-1">

                                </h5>
                                <h6 class="mb-0 fw-normal">Users</h6>
                            </div>
                            <div>
                                <a href="{{route('cms.Users.create')}}" class="btn btn-primary">Add new</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card table-card table-nowrap overflow-hidden card-table">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="mb-0 pe-3 flex-grow-1 text-truncate">Users List</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <!--::begin table head-->
                            <thead class="bg-body text-muted small text-uppercase">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@foreach($user->roles as $role) {{$role->name}}@endforeach</td>
                                    <td class="text-end">
                                        <a href="{{route('cms.Users.edit', $user)}}" class="btn btn-light btn-sm">
                                    <span class="material-symbols-rounded align-middle">
                                      edit
                                      </span>
                                        </a>
                                        <form class="d-inline" method="post" action="{{route('cms.Users.destroy', $user)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm px-0 btn-danger" onclick="return confirm('Are you shure to delete?')">
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
    </div>
@endsection
@section('js')

@endsection
