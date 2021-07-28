@extends('admin.layout.master')
@section('title',' Thêm danh sách người dùng')
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Customer</h3>

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
                    <input type="email" value="{{old('email')}}" id="inputClientCompany" name="email"
                           class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Number phone</label>
                    <input type="number" value="{{old('phone')}}" name="phone" id="inputDescription"
                           class="@error('phone') is-invalid @enderror form-control">
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Username</label>
                    <input type="text" value="{{old('username')}}" name="username" id="inputName"
                           class="@error('username') is-invalid @enderror form-control">
                    @error('username')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" value="{{old('password')}}" name="password" id="password"
                               class="@error('password') is-invalid @enderror form-control">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <span class="fas fa-eye-slash"></span>
                        </button>
                    </div>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Image</label>
                    <input type="file" value="}" name="image" id="image"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Accept</button>
                <a href="{{route('product.list')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection
