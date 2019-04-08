@extends('admin.master')

@section('title')
    {{"Admin list"}}
@endsection
@section('breadcrumb')
    <section class="content-header">
        <h1>
            Admin create an account
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create an account</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="{{route('admin.users.store')}}" enctype="multipart/form-data" class="admin-form">
                @csrf
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="name">User name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
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
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="passwordConfirm">Password confirm:</label>
                        <input id="passwordConfirm" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="phone">Phone number:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                               required>
                    </div>
                    @if ($errors->has('phone'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="role">User role:</label>
                        <select name="role" class="form-control" id="role" required>
                            <option value="2" @if (old('role') == 2) {{ 'selected' }} @endif>Administrator</option>
                            <option value="3" @if (old('role') == 3) {{ 'selected' }} @endif>Human Resources</option>
                        </select>
                    </div>
                    @if ($errors->has('role'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
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
                <button type="submit" class="btn btn-primary">Add user</button>
            </form>
        </div>
    </div>
@endsection
