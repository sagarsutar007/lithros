<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class FeedbackController extends Controller
{
    public function index()
    {
        // Retrieve all feedbacks from the database
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.feedbacks', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedbacks.new-feedback');
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        'description' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'approved' => 'required|in:1,0',
    ]);

    // Handle file upload
    if ($request->hasFile('profile_img')) {
        $image = $request->file('profile_img');
        $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('assets/uploads/');
        $image->move($imagePath, $filename);
    } else {
        return redirect()->back()->with('error', 'Image upload failed.');
    }

    // Create a new Feedback instance and store it in the database
    $feedback = new Feedback();
    $feedback->name = $validatedData['name'];
    $feedback->designation = $validatedData['designation'];
    $feedback->company = $validatedData['company'];
    $feedback->profile_img = $filename;  // Use the correct filename variable here
    $feedback->description = $validatedData['description'];
    $feedback->rating = $validatedData['rating'];
    $feedback->approved = $validatedData['approved'];
    $feedback->save();

    // Redirect back with success message
    return redirect()->route('feedbacks')->with('success', 'Feedback added successfully.');
}


    public function edit(Feedback $feedback)
    {
        return view('admin.feedbacks.edit-feedbacks', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'description' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'approved' => 'required|in:1,0',
    ]);

    // Update the feedback with the validated data
    $feedback->update([
        'name' => $validatedData['name'],
        'designation' => $validatedData['designation'],
        'company' => $validatedData['company'],
        'description' => $validatedData['description'],
        'rating' => $validatedData['rating'],
        'approved' => $validatedData['approved'],
    ]);

    // Handle image upload if a new image is provided
    if ($request->hasFile('profile_img') && $request->file('profile_img')->isValid()) {
        // Delete the old image if it exists
        if ($feedback->profile_img) {
            Storage::delete('assets/uploads/' . $feedback->profile_img);
        }
        // Upload the new image
        $image = $request->file('profile_img');
        $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('assets/uploads/');
        $image->move($imagePath, $filename);
        $feedback->profile_img = $filename;
    }

    // Save the updated feedback to the database
    $feedback->save();

    // Redirect back or to a specific route after updating the feedback
    return redirect()->route('feedbacks')->with('success', 'Feedback updated successfully');
}


    public function destroy(Feedback $feedback)
    {
        // Delete the feedback's image if it exists
        if ($feedback->profile_img) {
            Storage::delete('public/images/' . $feedback->profile_img);
        }
        // Delete the feedback from the database
        $feedback->delete();

        // Redirect back or to a specific route after deleting the feedback
        return redirect()->route('feedbacks')->with('success', 'Feedback deleted successfully');
    }
}

