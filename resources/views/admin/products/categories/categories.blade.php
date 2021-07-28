@extends('admin.layout.master')
@section('title','Categories')
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
            <h3 class="card-title">Categories</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{route('category.create')}}" class="post">Add</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Categories</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('productByCate', $category->id)}}" class="nav-link">
                                <p>Show</p>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('category.edit', $category->id)}}"><i class="far fa-edit fa-2x"></i></a>
                            {{--                            <a onclick="return confirm('Are you sure?')" href="{{route('product.delete', $category->id)}}"><i class="far fa-trash-alt tm-product-delete-icon fa-2x" style="color: red"></i></a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
