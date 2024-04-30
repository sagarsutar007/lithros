@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content')
<div class="row">
    <div class="col-md-6 my-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
                <div class="card-tools">
                    <a href="{{ route('categories') }}" class="btn btn-link btn-sm"><i class="fas fa-fw fa-reply"></i> Back to Categories</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category->category_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="name">Category Image:</label>
                                <div class="custom-file">
                                    <label class="custom-file-label">Choose file</label>
                                    <input type="file" class="custom-file-input" name="product_img" accept="image/*,.avif,.webp" value="{{ $category->product_img }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Product Description:</label>
                        <textarea class="form-control" name="about" placeholder="Product Description" value="{{ $category->about }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
