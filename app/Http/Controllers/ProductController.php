<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            "Rated Capacity",
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
            'description' => 'nullable',
            'specs.*' => 'required|string',
            'values.*' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->mrp = $validatedData['mrp'];
        $product->category_id = $validatedData['category_id'];
        $product->stock = $validatedData['stock'];
        $product->status = $validatedData['status'];
        $product->description = $validatedData['description'];
        $product->slug = Str::slug($validatedData['name']);
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
                $filename =  uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
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


    public function update(Request $request, Product $product)
    {
   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mrp' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,category_id',
            'stock' => 'required|in:1,0',
            'status' => 'required|in:1,0',
            'description' => 'nullable',
            'specs.*' => 'required|string',
            'values.*' => 'required|string',
        ]);

        $product->update([
            'name' => $validatedData['name'],
            'mrp' => $validatedData['mrp'],
            'category_id' => $validatedData['category_id'],
            'stock' => $validatedData['stock'],
            'status' => $validatedData['status'],
            'description' => $validatedData['description']
            
        ]);

        $product->specifications()->delete();

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
                $filename =  uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/');
                $image->move($imagePath, $filename);
                ProductImage::create([
                    'filename' => $filename,
                    'product_id' => $product->product_id
                ]);
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

    public function deleteImage(ProductImage $image)
    {
        // Delete the Image
        $imagePath = public_path('assets/images/products/' . $image->filename);

      
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        
        $image->delete();
        
        

        return response()->json(['success'=>true, 'message'=>'Image deleted successfully'], 200);
    }
}
