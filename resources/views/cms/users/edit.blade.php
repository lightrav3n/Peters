@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Edit User</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('cms.Users.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                            <h5 class="mb-1">Edit User</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cms.Users.update', $user)}}" class="z-index-1 position-relative needs-validation">
                                @csrf
                                @method('PATCH')
                                <div class="form-floating mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $user->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="name">{{ __('Name') }}</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $user->email }}" required autocomplete="email"
                                           placeholder="name@example.com">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="email">{{ __('Email Address') }}</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select id="userRole" name="userRole" class="form-control py-0" required>
                                        <option disabled="disabled" selected="selected" value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($user->getRoleNames()->first() == $role->name) selected @endif>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('userRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
