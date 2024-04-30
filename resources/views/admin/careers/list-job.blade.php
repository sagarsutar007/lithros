
@extends('adminlte::page')

@section('title', 'List of Careers')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-5 mx-3">
            <div class="card-header">
                <h3 class="card-title">List of Careers</h3>
                <div class="card-tools">
                    <a href="{{ route('careers.create') }}" class="btn btn-light btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Career</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <!-- Table Header -->
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Job Type</th>
                                <th>Job Location</th>
                                <th>Salary</th>
                                <th>Working Days</th>
                                <th>Working Hours</th>
                                <th>Skills Required</th>
                                <th>Education Required</th>
                                <th>Job Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through careers and display in table rows -->
                            @foreach($careers as $career)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $career->job_title }}</td>
                                <td>{{ $career->job_type }}</td>
                                <td>{{ $career->job_location }}</td>
                                <td>{{ $career->salary }}</td>
                                <td>{{ $career->working_days }}</td>
                                <td>{{ $career->working_hours }}</td>
                                <td>{{ $career->skills_required }}</td>
                                <td>{{ $career->education_required }}</td>
                                <td>{{ $career->job_description }}</td>
                                <td>{{ $career->job_status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <!-- Edit Career Button -->

                                    <a href="{{ route('careers.edit-job', ['career_id' => $career->career_id]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                    </a>
                                    <!-- Delete Career Form -->
                                    <form action="{{ route('careers.destroy', ['career' => $career->career_id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this career?')">
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

