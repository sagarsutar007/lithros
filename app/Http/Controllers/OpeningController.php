<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OpeningController extends Controller
{


    public function index()
    {
        $openings = Opening::all();
        return view('admin.openings.openings', compact('openings'));
    }

    public function create()
    {
        $openings = Opening::all();
        return view('admin.openings.add', compact('openings'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'salary' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'working_days' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:255',
        ]);

        $opening = new Opening();
        $opening->opening_id = (string) Str::uuid();
        $opening->title = $validatedData['title'];
        $opening->type = $validatedData['type'];
        $opening->experience = $validatedData['experience'];
        $opening->education = $validatedData['education'];
        $opening->skills = $validatedData['skills'];
        $opening->about = $validatedData['about'];
        $opening->salary = $validatedData['salary'];
        $opening->location = $validatedData['location'];
        $opening->working_days = $validatedData['working_days'];
        $opening->slug = Str::slug($opening->slug);
        $opening->working_hours = $validatedData['working_hours'];
        $opening->created_by = Auth::id();
        $opening->updated_by = null;
        $opening->save();


        return redirect()->route('openings')->with('success', 'Opening created successfully.');
    }


    public function show(Opening $opening)
    {
        return view('admin.openings.list-job', compact('openings'));
    }

    public function edit(Opening $opening)
    {
        $opening = Opening::all();
        return view('admin.openings.edit', compact('openings'));
    }

    public function update(Request $request, Opening $opening)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'salary' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'working_days' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:255',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ]);

        $opening->update($validatedData);

        return redirect()->route('openings')->with('success', 'Opening updated successfully');
    }
    public function listJob()
    {
        $openings = Opening::all();
        return view('admin.openings.list-job', compact('openings'));
    }

    public function destroy(Opening $opening)
    {
        $opening->delete();

        return redirect()->route('openings')->with('success', 'Opening deleted successfully');
    }
}
