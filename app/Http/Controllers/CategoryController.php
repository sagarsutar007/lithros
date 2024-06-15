<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $categories = Category::with('createdBy')->get();
        return view('admin.categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.new');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'categories.*' => 'required|string|max:255|unique:categories,name',
            'about.*' => 'required|string|max:255',
            'category_images.*' => 'image|mimes:jpeg,png,jpg,gif,avif,webp|max:20480',
        ]);

        // Store each category and its image in the database
        foreach ($request->categories as $key => $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->about = $request->input('about')[$key];
            $category->created_by = Auth::id();

            // Handle image upload
            if ($request->hasFile('category_images') && $request->file('category_images')[$key]->isValid()) {
                $image = $request->file('category_images')[$key];
                $filename = $this->uploadImage($image);
                $category->primary_img = $filename;
            }

            $category->slug = Str::slug($categoryName, '-');
            $category->save();
        }

        return redirect()->route('categories')->with('success', 'Categories added successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'categories.*' => 'required|string|max:255|unique:categories,name',
            'about.*' => 'required|string|max:255',
            'category_images.*' => 'image|mimes:jpeg,png,jpg,gif,avif,webp|max:20480',
        ]);
        

        // Update the category with the validated data
        $category->name = $request->input('name');
        $category->about = $request->input('about');
        $category->slug = Str::slug($request->input('name'), '-');
        $category->updated_by = Auth::id();

        // Handle image upload if a new image is provided
        if ($request->hasFile('category_images') && $request->file('category_images')->isValid()) {
            // Delete the old image if it exists
            if ($category->primary_img) {
                Storage::delete('public/assets/uploads/' . $category->primary_img);
            }

            // Upload the new image
            $image = $request->file('category_images');
            $filename = $this->uploadImage($image);
            $category->primary_img = $filename;
        }

        $category->save();

        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Delete the category image if it exists
        if ($category->primary_img) {
            Storage::delete('public/assets/uploads/' . $category->primary_img);
        }

        $category->delete();

        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }

    private function uploadImage($image)
    {
        $extension = $image->getClientOriginalExtension();
        $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = $originalFilename . '-' . time() . '.' . $extension;
        $image->storeAs('public/assets/uploads', $filename);

        return $filename;
    }
}

