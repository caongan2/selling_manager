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
    <div class="card">
        <div class="btn btn-secondary">
            <h3 class="card-title">Cart</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $key => $product)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{asset('storage/'. $product['image'])}}" style="width: 200px" alt="error"></td>
                        <td>{{$product['name']}}</td>
                        <td>${{$product['price']}}</td>
                        <td>{{$product['quantity']}}</td>
                        <td>${{$product['quantity']*$product['price']}}</td>
                        <td>
                            <a onclick="return confirm('Are you sure?')" href=""><i
                                    class="far fa-trash-alt tm-product-delete-icon fa-2x" style="color: red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

