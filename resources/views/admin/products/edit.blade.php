@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="{{ route('products.update', ['product' => $product]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Product
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('products') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-reply"></i> Back to Products</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="products-material-item-container">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="name">Product Name: <sup class="text-danger">*</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="name" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Enter Product name" value="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="price">MRP:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" id="price" class="@error('price') is-invalid @enderror form-control" name="mrp" placeholder="Price" value="{{ $product->mrp }}" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category:</label>
                                            <select name="category_id" id="category" class="form-control select2" style="width: 100%;">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_id }}" {{ $category->category_id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product-img">Product Images:</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="images[]" class="custom-file-input" id="product-img" accept="image/*" multiple>
                                                    <label class="custom-file-label" for="material-img">Product Images</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label>Stock:</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stock" id="available" value="1" {{ $product->stock ? 'checked':'' }}>
                                            <label class="form-check-label" for="available">Available</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stock" id="not-available" value="0" {{ $product->stock == 0 ? 'checked':'' }}>
                                            <label class="form-check-label" for="not-available">Not Available</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label>Status:</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="published" value="1" {{ $product->status ? 'checked':'' }}>
                                            <label class="form-check-label" for="published">Published</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="not-published" value="0" {{ $product->status == 0 ? 'checked':'' }}>
                                            <label class="form-check-label" for="not-published">Not Published</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Product Descrpition:</label>
                                            <textarea name="description" class="form-control" id="description" placeholder="Enter Product Description" >{{ $product->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-dark font-weight-bold">Product Specification</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark font-weight-bold">Specification Value</p>
                                    </div>
                                </div>
                                <div class="specifications-container">
                                    @foreach ($specifications as $specs)

                                    <div class="specification-item">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="specs[]" class="form-control" placeholder="Enter specification" value="{{ $specs->key }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="values[]" placeholder="Enter Value" value="{{ $specs->value }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-times remove-specification-item"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-outline-secondary add-specification-item"><i class="fas fa-fw fa-plus"></i> New</button>
                            <a href="{{ route('products') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Uploaded Images</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($images as $image)
                            <div class="col-md-6">
                                <img src="{{ asset('assets/images/products/'.$image->filename) }}" class="img-thumbnail w-100" alt="">
                                <button class="btn btn-outline-danger w-100 mt-3 btn-delete-image" data-imageid="{{$image->product_image_id}}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: 'Select Category',
                theme: 'bootstrap4',
                minimumResultsForSearch: -1
            });

            $(".add-specification-item").on('click', function () {
                $(".specifications-container").append(`
                    <div class="specification-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" name="specs[]" class="form-control" placeholder="Enter Specification" value="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="values[]" placeholder="Enter Value">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-times remove-specification-item"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

            $(document).on('click', '.remove-specification-item', function(){
                $(this).closest('.specification-item').remove();
            });

            $(document).on('click', '.btn-delete-image', function(){
                $(this).closest('.col-md-6').remove();

                var imageId = $(this).data('imageid');
                var csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    url: '/app/products/images/' + imageId,
                    type: 'DELETE',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Optionally, display an error message or perform any other action
                    }
                });
            });

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
@endsection
