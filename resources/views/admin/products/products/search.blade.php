@extends('admin.layout.master')
@section('title','Product List')
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
            <h3 class="card-title">Products</h3>
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{asset('storage/'.$product->image)}}" style="width: 100px" alt="error"></td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}"><i class="far fa-edit fa-2x"></i></a>
                            <a onclick="return confirm('Are you sure?')" href="{{route('product.delete', $product->id)}}"><i class="far fa-trash-alt tm-product-delete-icon fa-2x" style="color: red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
