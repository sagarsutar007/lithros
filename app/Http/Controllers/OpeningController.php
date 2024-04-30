<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;

class OpeningController extends Controller
{
    public function index()
    {
        $openings = Opening::all();
        return view('admin.openings.list', compact('openings'));
    }

    public function create()
    {
        return view('openings.create');
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
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ]);

        Opening::create($validatedData);

        return redirect()->route('openings')
            ->with('success', 'Opening created successfully.');
    }

    public function show(Opening $opening)
    {
        return view('openings.show', compact('opening'));
    }

    public function edit(Opening $opening)
    {
        return view('openings.edit', compact('opening'));
    }

    public function update(Request $request, Opening $opening)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            // Add validation rules for other fields
        ]);

        $opening->update($validatedData);

        return redirect()->route('openings')
            ->with('success', 'Opening updated successfully');
    }

    public function destroy(Opening $opening)
    {
        $opening->delete();

        return redirect()->route('openings')
            ->with('success', 'Opening deleted successfully');
    }
}
