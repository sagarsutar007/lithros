<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'name' => 'required',
            'user_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Handle file upload
        if ($request->hasFile('user_img')) {
            $imageName = time().'.'.$request->user_img->extension();
            $request->user_img->move(public_path('assets/uploads'), $imageName);
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        // Create a new Feedback instance and store it in the database
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->user_img = $imageName;
        $feedback->comment = $request->comment;
        $feedback->rating = $request->rating;
        $feedback->save();

        // Redirect back with success message
        return redirect()->route('feedbacks')->with('success', 'Feedback added successfully.');
    }

    public function edit(Feedback $feedback)
    {
        $context = [
            'feedbacks' => $feedback
        ];
        return view('admin.feedbacks.edit-feedback', compact($context));
    }

    public function update(Request $request, Feedback $feedback)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Update the feedback with the validated data
        $feedback->update([
            'name' => $request->input('name'),
            'company' => $request->input('company'),
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('user_img') && $request->file('user_img')->isValid()) {
            // Delete the old image if it exists
            if ($feedback->user_img) {
                Storage::delete('public/images/' . $feedback->user_img);
            }
            // Upload the new image
            $imagePath = $request->file('user_img')->store('public/images');
            $feedback->user_img = basename($imagePath);
        }

        // Save the updated feedback to the database
        $feedback->save();

        // Redirect back or to a specific route after updating the feedback
        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully');
    }

    public function destroy(Feedback $feedback)
    {
        // Delete the feedback's image if it exists
        if ($feedback->user_img) {
            Storage::delete('public/images/' . $feedback->user_img);
        }
        // Delete the feedback from the database
        $feedback->delete();

        // Redirect back or to a specific route after deleting the feedback
        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully');
    }
}

