@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Applicant List</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Position Applied For</th>
                            <th>Desired Start Date</th>
                            <th>Salary Expectations</th>
                            <th>Highest Level of Education</th>
                            <th>Work Experience</th>
                            <th>Relevant Skills</th>
                            <th>References</th>
                            <th>Cover Letter</th>
                            <th>Resume/CV</th>
                            <th>Additional Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->full_name }}</td>
                                <td>{{ $applicant->email }}</td>
                                <td>{{ $applicant->phone }}</td>
                                <td>{{ $applicant->address }}</td>
                                <td>{{ $applicant->position }}</td>
                                <td>{{ $applicant->start_date }}</td>
                                <td>{{ $applicant->salary_expectations }}</td>
                                <td>{{ $applicant->education }}</td>
                                <td>{{ $applicant->work_experience }}</td>
                                <td>{{ $applicant->skills }}</td>
                                <td>{{ $applicant->references }}</td>
                                <td>{{ $applicant->cover_letter }}</td>
                                <td>{{ $applicant->resume }}</td>
                                <td>{{ $applicant->additional_info }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
