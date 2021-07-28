@extends('admin.layout.master')
@section('title','Danh sách người dùng')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif
    <div class="card">
        <div class="btn btn-secondary">
            <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Number Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{asset('storage/'.$user->image)}}" style="width: 100px" alt="error"></td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="{{route('user.profile', $user->id)}}"><i class="fa fa-user fa-2x"></i></a>
                            <a href="{{route('user.update', $user->id)}}"><i class="far fa-edit fa-2x"></i></a>
                            <a onclick="return confirm('Are you sure?')" href="{{route('user.delete', $user->id)}}"><i class="far fa-trash-alt tm-product-delete-icon fa-2x" style="color: red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $users->links() }}

@endsection
