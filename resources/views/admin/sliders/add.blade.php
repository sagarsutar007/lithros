@extends('adminlte::page')

@section('title', 'Add New Slider')

@section('content')
<div class="row">
    <div class="col-md-7 mx-auto">
        <form action="{{ route('sliders.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">
                        Add Slider
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('sliders') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-reply"></i> Back to Sliders</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="products-material-item-container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Slider Title: <sup class="text-danger">*</sup></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="@error('title') is-invalid @enderror form-control" name="title" placeholder="Enter Slider title" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slider-img">Slider Images:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="slider-img" accept="image/*" multiple>
                                            <label class="custom-file-label" for="slider-img">Slider Images</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Slider Descrpition:</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter Slider Description" ></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-1 form-check-inline">
                                    <label>Status:</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="published" value="1" checked="" {{ old('status') == '1' ? 'selected' : '' }}>
                                    <label class="form-check-label" for="published">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="not-published" value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    <label class="form-check-label" for="not-published">Not Published</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('sliders.create') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
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
