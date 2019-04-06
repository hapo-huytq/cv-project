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
        <div class="col-md-12">
            Create Admin page
        </div>
    </div>
@endsection
