@extends('admin.layout.master')
@section('title','Update Product')
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
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputClientCompany">Name</label>
                    <input type="text" value="{{$product->name}}" id="inputClientCompany" name="name"
                           class="@error('name') is-invalid @enderror form-control">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Price</label>
                    <input type="number" value="{{$product->price}}" name="price" id="inputDescription"
                           class="@error('price') is-invalid @enderror form-control">
                    @error('price')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Category</label>
                    <select type="number" name="category" class="form-control" id="">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <img src="{{asset('storage/'.$product->image)}}" style="width: 100px" alt="error">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Image</label>
                    <input type="file" value="" name="image" id="image"
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
