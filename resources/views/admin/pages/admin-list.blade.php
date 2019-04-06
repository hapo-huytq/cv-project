@extends('admin.master')

@section('title')
    {{"Admin list"}}
@endsection
@section('breadcrumb')
    <section class="content-header">
        <h1>
            Admin accounts list
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admins list</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            Admin List page
        </div>
    </div>
@endsection
