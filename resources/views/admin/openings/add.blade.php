@extends('adminlte::page')

@section('title', 'Add New openings')

@section('content')
<div class="row">
    <div class="col-md-7 mx-auto">
        <form action="{{ route('openings.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">
                        Create Openings
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('openings') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-reply"></i> Back to openings</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="openings-material-item-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Job Title" required value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Job Type:</label>
                                    <select id="type" class="form-control select2 @error('type') is-invalid @enderror" name="type" required>
                                        <option value="Full time" {{ old('type') == 'Full time' ? 'selected' : '' }}>Full time</option>
                                        <option value="Part time" {{ old('type') == 'Part time' ? 'selected' : '' }}>Part time</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="experience">Experience:</label>
                                    <input type="text" id="experience" class="form-control @error('experience') is-invalid @enderror" name="experience" placeholder="Enter Experience" required value="{{ old('experience') }}">
                                    @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education">Education:</label>
                                    <input type="text" id="education" class="form-control @error('education') is-invalid @enderror" name="education" placeholder="Enter Education" required value="{{ old('education') }}">
                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skills">Skills:</label>
                                    <input type="text" id="skills" class="form-control @error('skills') is-invalid @enderror" name="skills" placeholder="Enter Skills" required value="{{ old('skills') }}">
                                    @error('skills')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about">Job Description:</label>
                                    <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about" required>{{ old('about') }}</textarea>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salary">Salary:</label>
                                    <input type="number" id="salary" class="form-control @error('salary') is-invalid @enderror" name="salary" required value="{{ old('salary') }}">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" id="location" class="form-control @error('location') is-invalid @enderror" name="location" required value="{{ old('location') }}">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="working_days">Working Days:</label>
                                    <select id="working_days" class="form-control select2 @error('working_days') is-invalid @enderror" name="working_days" required>
                                        <option value="5" {{ old('working_days') == '5' ? 'selected' : '' }}>5 Days</option>
                                        <option value="6" {{ old('working_days') == '6' ? 'selected' : '' }}>6 Days</option>
                                        <option value="7" {{ old('working_days') == '7' ? 'selected' : '' }}>7 Days</option>
                                    </select>
                                    @error('working_days')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="working_hours">Working Hours:</label>
                                    <input type="text" id="working_hours" class="form-control @error('working_hours') is-invalid @enderror" name="working_hours" placeholder="09.00 AM - 06.00 PM" required value="{{ old('working_hours') }}">
                                    @error('working_hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('openings.create') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
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
            $('.select2').select2({
                placeholder: 'Select Category',
                theme: 'bootstrap4',
                minimumResultsForSearch: -1
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
