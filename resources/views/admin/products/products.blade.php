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
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>MRP</th>
                                <th>Product Images</th>
                                <th>Category</th>
                                <th>Product Specification</th>
                                <th>Product Specification Values</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{-- Insert logic to display product images --}}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{-- Insert logic to display product specifications --}}</td>
                                <td>{{-- Insert logic to display product specification values --}}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->status ? 'Published' : 'Not Published' }}</td>
                                <td>

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
