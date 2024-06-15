@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="{{ route('sliders.update', ['slider' => $slider]) }}" enctype="multipart/form-data">
                @csrf
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Slider
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('sliders') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-reply"></i> Back to Sliders</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="form-group">
                                    <label for="title">Slider Title: <sup class="text-danger">*</sup></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="@error('title') is-invalid @enderror form-control" name="title" placeholder="Enter Slider title" value="{{ $slider->title }}">
                                        @error('title')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="form-group">
                                    <label for="slider-img">Slider Image:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="slider_img" class="custom-file-input" id="slider-img" accept="image/*">
                                            <label class="custom-file-label" for="slider-img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ $slider->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Published</option>
                                        <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Unpublished</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('sliders') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">Current Slider Image</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($slider->slider_img)
                            <div class="col-md-6">
                                <img src="{{ asset('assets/images/sliders/'.$slider->slider_img) }}" class="img-thumbnail w-100" alt="">
                                    <button class="btn btn-outline-danger w-100 mt-3 btn-delete-image" data-imageid="{{ $slider->id }}">
                                        <i class="fas fa-trash"></i> Delete</button>
                            </div>
                        @endif
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

            $(document).on('click', '.btn-delete-image', function(){
                var imageId = $(this).data('imageid');
                var csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    url: '/images/' + imageId,
                    type: 'DELETE',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        if(response.success) {
                            toastr.success(response.message);
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred while deleting the image.');
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
