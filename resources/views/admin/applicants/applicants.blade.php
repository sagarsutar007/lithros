@extends('adminlte::page')

@section('title', 'List of Applicants')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <h3 class="card-title">List of Applicants</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="applicants">
                        <thead>
                            <tr>
                                <th>Applicant ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Profile Image</th>
                                <th>Permanent Address</th>
                                <th>Present Address</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->applicant_id }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->phone }}</td>
                                <td>{{ $applicant->gender }}</td>
                                <td>{{ $applicant->email }}</td>
                                <td><img src="{{ asset('assets/images/profile/' . $applicant->profile_img) }}" alt="Profile Image" style="max-width: 100px;"></td>
                                <td>{{ $applicant->permanent_address }}</td>
                                <td>{{ $applicant->present_address }}</td>
                                <td><a href="{{ asset('assets/resumes/' . $applicant->cv) }}" download>{{ $applicant->cv }}</a></td>
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
        $("#applicants").DataTable();
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
