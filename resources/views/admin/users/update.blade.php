@extends('admin.layout.master')
@section('title')
    {{$users->username}}
@endsection
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Update Information</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputClientCompany">Email</label>
                    <input type="email" value="{{$users->email}}" disabled id="inputClientCompany" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Number phone</label>
                    <input type="number" value="{{$users->phone}}" name="phone" id="inputDescription" class="@error('phone') is-invalid @enderror form-control">
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Username</label>
                    <input type="text" value="{{$users->username}}" name="username" id="inputName" class="@error('username') is-invalid @enderror form-control">
                    @error('username')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Password</label>
                    <input type="password" value="{{$users->password}}" name="password" id="inputDescription" class="@error('password') is-invalid @enderror form-control">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Image</label>
                    <input type="file" value="{{old('image')}}" name="image" id="image"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Accept</button>
                <a href="{{route('user.list')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
@endsection
