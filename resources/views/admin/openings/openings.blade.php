@extends('adminlte::page')

@section('title', 'List of Openings')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <h3 class="card-title">List of Openings</h3>
                <div class="card-tools">
                    <a href="{{ route('openings.create') }}" class="btn btn-light btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Openings</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="openings">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Job Type</th>
                                <th>Experience</th>
                                <th>Education</th>
                                <th>Skills</th>
                                <th>About</th>
                                <th>Salary</th>
                                <th>Location</th>
                                <th>Working Days</th>
                                <th>Working Hours</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td>{{ $opening->location }}</td>
                                <td>{{ $opening->working_days }}</td>
                                <td>{{ $opening->working_hours }}</td>
                                <td>{{ $opening->created_by }}</td>
                                <td>{{ $opening->updated_by }}</td>
                                <td>
                                    <a href="{{ route('openings.edit', ['opening' => $opening]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('openings.destroy', ['opening' => $opening]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Opening?')">
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
@section('js')
    <script>
        $(function () {
            $("#openings").DataTable();
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
