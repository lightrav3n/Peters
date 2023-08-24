@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Role Types</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('cms.Users.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Role Types</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-lg-5">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-1">Add new role type</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cms.users.roles.store')}}" class="z-index-1 position-relative needs-validation">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus
                                           placeholder="Role Name">
                                    <label for="name">Role Name</label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Role</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3 mb-lg-5">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-1">Roles in database</h5>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0 lh-lg">
                                @foreach($roles as $role)
                                <li>{{$role->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
