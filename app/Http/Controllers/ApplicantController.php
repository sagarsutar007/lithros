<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        return view('applicant-list', compact('applicants'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'salary_expectations' => 'nullable|string|max:255',
            'education' => 'required|string|max:255',
            'work_experience' => 'nullable|string',
            'skills' => 'nullable|string',
            'references' => 'nullable|string',
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|max:2048', // Assuming maximum file size is 2MB
            'additional_info' => 'nullable|string',
            'consent' => 'required|accepted',
        ]);

        // Handle file upload for resume
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes');
        } else {
            $resumePath = null;
        }

        // Create a new applicant record
        $applicant = new Applicant([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'position' => $request->input('position'),
            'start_date' => $request->input('start_date'),
            'salary_expectations' => $request->input('salary_expectations'),
            'education' => $request->input('education'),
            'work_experience' => $request->input('work_experience'),
            'skills' => $request->input('skills'),
            'references' => $request->input('references'),
            'cover_letter' => $request->input('cover_letter'),
            'resume' => $resumePath,
            'additional_info' => $request->input('additional_info'),
            'consent' => $request->input('consent'),
        ]);

        // Save the applicant record
        $applicant->save();

        return redirect()->back()->with('success', 'Applicant created successfully.');
    }
}
