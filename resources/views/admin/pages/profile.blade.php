@extends('admin.master')
@section('title')
    {{"Dashboard"}}
@endsection
@section('breadcrumb')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(Auth::guard('admin')->user()->avatar !== null)
                    <img class="profile-user-img img-responsive img-circle"
                         src="{{ asset('upload/avatar/admin/'.Auth::guard('admin')->user()->avatar)  }}"
                         alt="User profile picture">
                    @else
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{ asset('backend/dist/img/user4-128x128.jpg')  }}" alt="User profile picture">
                    @endif
                    <h3 class="profile-username text-center">
                        {{ Auth::guard('admin')->user()->name }}
                    </h3>
                    <p class="text-muted text-center">
                        @if(Auth::guard('admin')->user()->type === 1)
                            {{"Supper administrator"}}
                        @elseif(Auth::guard('admin')->user()->type === 2)
                            {{"Administrator"}}
                        @else
                            {{"Humman Resources"}}
                        @endif
                    </p>
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                          class="admin-form">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="input-wrapper">
                                <label for="name">User name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ Auth::guard('admin')->user()->name }}"
                                       required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-wrapper">
                                <label for="phone">Phone number:</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ Auth::guard('admin')->user()->phone }}"
                                       required>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <div class="custom-file">
                                <input type=file id="avatar"
                                       class="btn btn-default"
                                       name="avatar">
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                            @endif
                        </div>
                        @if(Session::has('saveError'))
                            <span class="alert-danger">
                            <strong>{{Session::get('saveError')}}</strong>
                        </span>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block">Update profile</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
