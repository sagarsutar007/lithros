<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public function create() {
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
                $extension = $image->getClientOriginalExtension(); // Get the original file extension
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original filename
                $filename = $originalFilename . '-' . time() . '.' . $extension; // Construct the new filename
                $imagePath = public_path('assets/uploads/' . $filename);
                $image->move(public_path('assets/uploads'), $filename);
                $category->primary_img = $filename;
            }


            $category->slug = Str::slug($categoryName, '-');
            $category->save();
        }

        return redirect()->route('categories')->with('success', 'Categories added successfully.');
    }


    // Edit category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'required|string',
        ]);

        $category->update([
            'name' => $request->input('name'),
            'about' => $request->input('about'),
        ]);

        // Update the category with the validated data
        $category->name = $request->name;

    // Handle image upload if a new image is provided
    if ($request->hasFile('category_images') && $request->file('category_images')->isValid()) {
        // Delete the old image if it exists
        if ($category->primary_img) {
            unlink(public_path('assets/uploads/' . $category->primary_img));
        }

        // Upload the new image
        $image = $request->file('category_images');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/uploads'), $filename);
        $category->primary_img = $filename;
    }

    // Update the category in the database
    $category->slug = Str::slug($request->name, '-');
    $category->save();

    // Redirect back to the categories index page with a success message
    return redirect()->route('categories')->with('success', 'Category updated successfully.');
}

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }




}
