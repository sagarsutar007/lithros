@extends('adminlte::page')

@section('title', 'Edit Career')


@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        
        <form action="{{ route('careers.update', ['careers' => $career->id]) }}" method="POST">
            @csrf

            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-fw fa-edit"></i> Update Career</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_title">Job Title:</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $career->job_title }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="job_type">Job Type:</label>
                                <select class="form-control" id="job_type" name="job_type">
                                    <option value="Full time" {{ $career->job_type == 'Full time' ? 'selected' : '' }}>Full time</option>
                                    <option value="Half time" {{ $career->job_type == 'Half time' ? 'selected' : '' }}>Half time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="job_status">Status:</label>
                                <select class="form-control" id="job_status" name="job_status">
                                    <option value="1" {{ $career->job_status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $career->job_status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_location">Job Location:</label>
                                <input type="text" class="form-control" id="job_location" name="job_location" value="{{ $career->job_location }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" class="form-control" id="salary" name="salary" value="{{ $career->salary }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="working_days">Working Days:</label>
                                <select class="form-control" id="working_days" name="working_days">
                                    <option value="5 Days" {{ $career->working_days == '5 Days' ? 'selected' : '' }}>5 Days</option>
                                    <option value="6 Days" {{ $career->working_days == '6 Days' ? 'selected' : '' }}>6 Days</option>
                                    <option value="7 Days" {{ $career->working_days == '7 Days' ? 'selected' : '' }}>7 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="working_hours">Working Hours:</label>
                                <input type="text" class="form-control" id="working_hours" name="working_hours" value="{{ $career->working_hours }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skills_required">Skills Required:</label>
                                <input type="text" class="form-control" id="skills_required" name="skills_required" value="{{ $career->skills_required }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="education_required">Education Required:</label>
                                <input type="text" class="form-control" id="education_required" name="education_required" value="{{ $career->education_required }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_description">Job Description:</label>
                                <textarea class="form-control" id="job_description" name="job_description" rows="4">{{ $career->job_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Add more fields as needed -->
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('careers') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-fw fa-check"></i> Update Career</button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop
