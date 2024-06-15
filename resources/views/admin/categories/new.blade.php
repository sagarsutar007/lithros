@extends('adminlte::page')

@section('title', 'Create Categories')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('categories.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Add New Categories</h3>
                    <div class="card-tools">
                        <a href="{{ route('categories') }}" class="btn btn-link btn-sm"><i class="fas fa-fw fa-reply"></i> Back to Categories</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="category-item-container">
                        <div class="category-item mb-3">
                            <div class="row">
                                <div class="col-11">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="categories[]" placeholder="Category name">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group mb-3">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="category_images[]" accept="image/*,.avif,.webp">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <textarea class="form-control" name="about[]" placeholder="Product Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="d-flex flex-column align-items-stretch justify-content-center bg-danger h-100 rounded text-center">
                                        <i class="fas fa-trash remove-category-item"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('categories') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-fw fa-check"></i> Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(function () {
            // Function to add a new category item
            $(".add-category-item").click(function () {
                var newItem = `
                    <div class="category-item mb-3">
                        <div class="row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="categories[]" placeholder="Category name">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group mb-3">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="category_images[]" accept="image/*,.avif,.webp">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <textarea class="form-control" name="about[]" placeholder="Product Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="d-flex flex-column align-items-stretch justify-content-center bg-danger h-100 rounded text-center">
                                    <i class="fas fa-trash remove-category-item"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $(".category-item-container").append(newItem);
            });

            // Function to remove the closest category item
            $(".category-item-container").on('click', '.remove-category-item', function () {
                if ($('.category-item').length > 1) {
                    $(this).closest('.category-item').remove();
                } else {
                    alert("At least one category item is required.");
                }
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
@stop
