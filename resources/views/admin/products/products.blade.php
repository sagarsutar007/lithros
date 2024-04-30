@extends('adminlte::page')

@section('title', 'List of Products')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <h3 class="card-title">List of Products</h3>
                <div class="card-tools">
                    <a href="{{ route('products.create') }}" class="btn btn-light btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Product</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="products">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>MRP</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td>{{ $product->mrp }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->stock ? 'Available' : 'Not Available' }}</td>
                                <td>{{ $product->status ? 'Published' : 'Not Published' }}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(function () {
            $("#products").DataTable();
            // Show Error Messages
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            // Show Success Message
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        });
    </script>
@stop
