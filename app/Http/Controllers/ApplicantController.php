<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Opening;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        return view('admin.applicants.applicants', compact('applicants'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'permanent_address' => 'required|string',
            'present_address' => 'required|string',
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'cv' => 'required|file|mimes:pdf|max:20480',
        ]);

        $applicant = new Applicant();
        $applicant->name = $validatedData['name'];
        $applicant->phone = $validatedData['phone'];
        $applicant->gender = $validatedData['gender'];
        $applicant->email = $validatedData['email'];
        $applicant->permanent_address = $validatedData['permanent_address'];
        $applicant->present_address = $validatedData['present_address'];

        // Handle profile image upload
        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $profileImageName = uniqid() . '-' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('assets/images/profile/'), $profileImageName);
            $applicant->profile_img = 'assets/images/profile/' . $profileImageName;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $resume = $request->file('cv');
            $resumeName = uniqid() . '-' . time() . '.' . $resume->getClientOriginalExtension();
            $resume->move(public_path('assets/resumes/'), $resumeName);
            $applicant->cv = 'assets/resumes/' . $resumeName;
        }

        $applicant->save();

        return redirect()->back()->with('success', 'Applicant created successfully!');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        
        if (file_exists(public_path($applicant->profile_img))) {
            unlink(public_path($applicant->profile_img));
        }
        if (file_exists(public_path($applicant->cv))) {
            unlink(public_path($applicant->cv));
        }
        
        $applicant->delete();

        return redirect()->back()->with('success', 'Applicant deleted successfully!');
    }
}

