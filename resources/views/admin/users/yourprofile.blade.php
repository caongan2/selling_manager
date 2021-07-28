@extends('admin.layout.master')
@section('title')
    {{session('userLogin')['username']}}
@endsection
@section('content')
<?php $users = \App\Models\User::all() ?>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{asset('storage/'.session('userLogin')['image'])}}"
                     alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">
                {{session('userLogin')['username']}}
            </h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Email</b>  <a class="float-right">{{session('userLogin')['email']}}</a>
                </li>
                <li class="list-group-item">
                    <b>Number phone</b> <a class="float-right">{{session('userLogin')['phone']}}</a>
                </li>
                <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">{{count($users)}}</a>
                </li>
            </ul>

            <a href="{{route('user.update', session('userLogin')['id'])}}" class="btn btn-primary btn-block"><b>Update</b></a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
