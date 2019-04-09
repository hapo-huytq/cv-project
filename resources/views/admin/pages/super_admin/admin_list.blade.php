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
                            <div class="flex-wrapper">
                                <form action="{{ route('users_change_role', ['adminUser' => $user->id ]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" style="background:none; border:none;" title="Change role"><i class="fa fa-repeat" aria-hidden="true"></i></button>
                                </form>
                                <form action="{{ route('admin.users.destroy', ['adminUser' => $user->id ]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" style="background:none; border:none;" title="Move to trash"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div>
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
