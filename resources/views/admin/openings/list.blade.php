
@extends('adminlte::page')

@section('title', 'Openings')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-5 mx-3">
            <div class="card-header">
                <h3 class="card-title">Openings</h3>
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
                            @foreach($openings as $opening)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $opening->title }}</td>
                                <td>{{ $opening->type }}</td>
                                <td>{{ $opening->experience }}</td>
                                <td>{{ $opening->education }}</td>
                                <td>{{ $opening->skills }}</td>
                                <td>{{ $opening->about }}</td>
                                <td>{{ $opening->salary }}</td>
                                <td>{{ $opening->loation }}</td>
                                <td>{{ $opening->working_days }}</td>
                                <td>{{ $opening->working_hours }}</td>
                                <td>{{ $opening->created_by }}</td>
                                <td>{{ $opening->updated_by }}</td>
                                <td>
                                    <!-- Edit Career Button -->

                                    <a href="{{ route('openings.edit', ['opening_id' => $opening->opening_id]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                    </a>
                                    <!-- Delete Career Form -->
                                    <form action="{{ route('careers.destroy', ['career' => $opening->opening_id]) }}" method="POST" style="display: inline;">
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

