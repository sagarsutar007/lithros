<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:1,0',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = new Slider();
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $validatedData['status'];
        $slider->save();

        if ($validatedData['status'] == 1) {
            $slider['status'] = $validatedData['status'];
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/sliders/');
                $image->move($imagePath, $filename);
                $slider->update(['slider_img' => $filename]);
            }
        }

        return redirect()->route('sliders')->with('success', 'Slider added successfully');
    }

    public function edit(Slider $slider)
    {
        $images = $slider->images;
        return view('admin.sliders.edit', compact('slider','images'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:1,0',
            'slider_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $validatedData['status'];

        if ($request->hasFile('slider_img')) {
            if ($slider->slider_img) {
                $oldImagePath = public_path('assets/images/sliders/' . $slider->slider_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('slider_img');
            $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('assets/images/sliders/');
            $image->move($imagePath, $filename);
            $slider->slider_img = $filename;
        }

        $slider->save();

        return redirect()->route('sliders')->with('success', 'Slider updated successfully');
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('sliders')->with('success', 'Slider deleted successfully');
    }

    public function deleteImage(Slider $slider)
    {
        $filename = $slider->slider_img;
        $imagePath = public_path('assets/images/sliders/' . $filename);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->slider_img = null;
        $slider->save();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully'], 200);
    }

}
