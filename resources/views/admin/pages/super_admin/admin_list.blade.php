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
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr class="active">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr class="@if($user->type === 2) {{'success'}} @else {{'info'}} @endif">
                        <td>
                            {{ ($key + 1) + ( $users->perPage() * ($users->currentPage() -1) ) }}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->phone}}
                        </td>
                        <td>
                            @if($user->type === 2)
                                {{"Admin"}}
                            @else
                                {{"HR"}}
                            @endif
                        </td>
                        <td>
                            #
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
