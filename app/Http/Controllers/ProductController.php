<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.products', compact('products'));
    }

    public function create()
    {
        $specifications = array(
            "Battery Pack Energy",
            "Nominal Voltage",
            "Cycle Life",
            "Charging Method",
            "Charging Voltage",
            "Charging Current",
            "Continous Discharge Current",
            "Peak Instant Discharge Current",
            "Peak Instant Discharge Time",
            "Discharge Cutt-Off Voltage",
            "Discharge Temperature Range",
            "Charging Temperature Range"
        );
        $categories = Category::all();
        return view('admin.products.add', compact('categories', 'specifications'));
    }

    // Method to store a newly created product in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mrp' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,category_id',
            'stock' => 'required|in:1,0',
            'status' => 'required|in:1,0',
            'specs.*' => 'required|string',
            'values.*' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->mrp = $validatedData['mrp'];
        $product->category_id = $validatedData['category_id'];
        $product->stock = $validatedData['stock'];
        $product->status = $validatedData['status'];
        $product->save();

        $specifications = [];
        foreach ($validatedData['specs'] as $index => $spec) {
            $specifications[] = new Specification([
                'key' => $spec,
                'value' => $validatedData['values'][$index],
            ]);
        }

        $product->specifications()->saveMany($specifications);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/');
                $image->move($imagePath, $filename);
                ProductImage::create([
                    'filename' => $filename,
                    'product_id' => $product->product_id
                ]);
            }
        }

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    // Method to display the specified product
    public function show(Product $product)
    {
        // Assuming you have a view for showing a single product
        return view('admin.products.list-product', compact('products'));
    }

    // Method to show the form for editing the specified product
    public function edit(Product $product)
    {
        $categories = Category::all();
        $specifications = $product->specifications;
        $images = $product->images;

        return view('admin.products.edit', compact('product', 'categories', 'specifications', 'images'));
    }

    // Method to update the specified product in the database
    public function update(Request $request, Product $product)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'images.*' => 'nullable|image|max:20480',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:1,0',
            'status' => 'required|in:1,0',
            'product-specification.*' => 'required|string',
            'specification-values.*' => 'required|string',
        ]);

        // Update the product with the new data
        $product->update([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
            'stock' => $validatedData['type'] == '1' ? 'available' : 'not available',
            'status' => $validatedData['status'] == '1' ? 'published' : 'not published',
        ]);

        // Delete existing specifications and values
        $product->specifications()->delete();

        // Store product specifications and values
        $product->specifications()->createMany(array_map(function ($spec, $value) {
            return ['name' => $spec, 'value' => $value];
        }, $validatedData['product-specification'], $validatedData['specification-values']));

        // Handle file uploads if any
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $photo) {
        //         $path = $photo->store('images');
        //         $product->images()->create(['path' => $path]);
        //     }
        // }

        foreach ($request->products as $key => $productName) {
            $product = new Product();
            $product->name = $productName;

        // Handle image upload
        if ($request->hasFile('images') && $request->file('images')[$key]->isValid()) {
            $image = $request->file('images')[$key];
            $filename = time() . '_' . $image->getClientOriginalName(); // Using original name for filename
            $image->storeAs('public/assets/uploads', $filename); // Store the image in the 'public/assets/uploads' directory

            // Update the 'images' column in the database with the filename
            $product->images = $filename;
        }
    }

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    // Method to remove the specified product from the database
    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}
