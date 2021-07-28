@extends('admin.layout.master')
@section('title','Thêm giỏ hàng')
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
    <div class="card card-primary card-outline col-6">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{asset('storage/'.$product->image)}}"
                     alt="User profile picture" style="width: 200px">
            </div>

            <h3 class="profile-username text-center">
                {{$product->name}}
            </h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Price</b>  <a class="float-right">{{$product->price}}</a>
                </li>
                <li class="list-group-item">
                    <b>View Count</b> <a class="float-right">{{$product->view_count}}</a>
                </li>
                <li class="list-group-item">
                    <b>Bought</b> <a class="float-right">{{$product->bought}}</a>
                </li>

            </ul>
            <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-primary btn-block"> <i class="far fa-cart-plus fa-2x"></i></a>
            <a href="{{}}" class="btn btn-primary btn-block"><b>Update</b></a>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

