
@extends('adminlte::page')

@section('title', 'Create New Job')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        @if(session('success'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                    });
                });
            </script>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="jobForm" action="{{ route('careers.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-fw fa-plus"></i> Create New Job</h3>
                    <div class="card-tools">
                        <a href="{{ route('careers.list-job') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-th-large"></i> View Job Listings</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="products-material-item-container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="job_title">Job Title:</label>
                                    <input type="text" id="job_title" class="form-control @error('job_title') is-invalid @enderror" name="job_title" placeholder="Enter Job Title" required>
                                    @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="job_type">Job Type:</label>
                                    <select id="job_type" class="form-control @error('job_type') is-invalid @enderror" name="job_type" required>
                                        <option value="Full time">Full time</option>
                                        <option value="Half time">Half time</option>
                                    </select>
                                    @error('job_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-1 ">
                                    <label>Job Status:</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="available" value="1" checked="">
                                    <label class="form-check-label" for="available">Active</label>
                                </div><div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="not-available" value="0">
                                    <label class="form-check-label" for="not-available">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_location">Job Location:</label>
                                    <input type="text" id="job_location" class="form-control @error('job_location') is-invalid @enderror" name="job_location" required>
                                    @error('job_location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salary">Salary in CTC:</label>
                                    <input type="number" id="salary" class="form-control @error('salary') is-invalid @enderror" name="salary" required>
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="working_days">Working Days:</label>
                                    <select id="working_days" class="form-control @error('working_days') is-invalid @enderror" name="working_days" required>
                                        <option value="5 Days">5 Days</option>
                                        <option value="6 Days">6 Days</option>
                                        <option value="7 Days">7 Days</option>
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
                                    <input type="text" id="working_hours" class="form-control @error('working_hours') is-invalid @enderror" name="working_hours" placeholder="09.00 AM - 06.00 PM" required>
                                    @error('working_hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skills_required">Skills Required:</label>
                                    <input type="text" id="skills_required" class="form-control @error('skills_required') is-invalid @enderror" name="skills_required" required>
                                    @error('skills_required')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education_required">Education Required:</label>
                                    <input type="text" id="education_required" class="form-control @error('education_required') is-invalid @enderror" name="education_required" placeholder="Graduation" required>
                                    @error('education_required')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_description">Job Description:</label>
                                    <textarea id="job_description" class="form-control @error('job_description') is-invalid @enderror" name="job_description" required></textarea>
                                    @error('job_description')
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
                    <a href="{{ route('careers') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-fw fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Submit Form with SweetAlert -->
<script>
    $('#jobForm').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Career created successfully.',
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to create career.',
                });
            }
        });
    });
</script>

@stop





