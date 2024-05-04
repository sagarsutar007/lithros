@extends('adminlte::page')

@section('title', 'Create Feedback')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('feedbacks.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Create Feedback</h3>
                        <div class="card-tools">
                            <a href="{{ route('feedbacks') }}" class="btn btn-light btn-sm"><i class="fas fa-fw fa-th-large"></i> View Feedbacks</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="user_img" accept="image/*,.avif,.webp">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Enter comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select class="form-control" name="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
