@extends('admin.layout.master')
@section('title','Update Category')
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">New category</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputClientCompany">Name</label>
                    <input type="text" value="" id="inputClientCompany" name="name"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Accept</button>
                <a href="{{route('category.list')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection
