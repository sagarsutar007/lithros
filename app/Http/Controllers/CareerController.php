<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;


class CareerController extends Controller
{
    /**
     * Show the form for creating a new career.
     *
     * @return \Illuminate\View\View
     */

     public function index()
    {

        $careers = Career::all();
        return view('admin.careers.list-job', compact('careers'));

    }
    public function create()
    {
        return view('admin.careers.add-job');
    }

    /**
     * Store a newly created career in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_type' => 'required|in:Full time,Half time',
            'type' => 'required|boolean',
            'job_location' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'working_days' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'skills_required' => 'required|string|max:255',
            'education_required' => 'required|string|max:255',
            'job_description' => 'required|string',
        ]);

        Career::create($request->all());

        return redirect()->route('careers')->with('success', 'Career created successfully.');
    }

    public function listJob()
    {
        $careers = Career::all();
        return view('admin.careers.list-job', compact('careers'));
    }


    public function edit($career_id)
    {
        $career = Career::findOrFail($career_id);
        return view('admin.careers.edit-job', compact('career'));
    }
    // public function edit(Career $career)
    // {
    //     return view('admin.careers.edit-job', compact('career'));
    // }

    /**
     * Update the specified career in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_type' => 'required|in:Full time,Half time',
            'type' => 'required|boolean',
            'job_location' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'working_days' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'skills_required' => 'required|string|max:255',
            'education_required' => 'required|string|max:255',
            'job_description' => 'required|string',
        ]);

        $career->update($request->all());

        return redirect()->route('careers')->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified career from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('careers.list-job')->with('success', 'Career deleted successfully.');
    }
}
