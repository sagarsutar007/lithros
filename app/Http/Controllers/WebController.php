<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Opening;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Applicant;
use Illuminate\Http\Request;


class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $feedbacks = Feedback::all();
         $categories = Category::all();
        return view('web.home', compact('feedbacks','sliders','categories'));
    }

    public function company()
    {
        $categories = Category::all();
        return view('web.company', compact('categories'));
    }


    public function legals()
    {
        return view('web.legals', compact('categories'));
    }

    public function gallery()
    {
        return view('web.gallery', compact('categories'));
    }

    public function csr()
    {
        return view('web.csr');
    }

    public function recharging()
    {
        return view('web.recharging');
    }

    public function recycling()
    {
        return view('web.recycling');
    }

    public function requestQuote()
    {
        return view('web.requote');
    }

    public function products()
    {   
        $products = Product::with('images')->get();
        $products = Product::paginate(9);
        // dd($products);
        $categories = Category::withCount('products')->get();
        return view('web.products', compact('categories', 'products'));
    }

    public function openings()
    {
        $applicants = Applicant::all();
        $openings = Opening::paginate(3);
        return view('web.openings', compact('openings', 'applicants', 'categories'));
    }

    public function contact()
    {
        return view('web.contact', compact('categories'));
    }

    public function showBySlug($slug)
    {   
        $product = Product::with('specifications')->where('slug', $slug)->firstOrFail();
        return view('web.product-details', compact('product', 'categories'));
    }

    public function openingSlug($slug)
    {   
        $product = Opening::where('slug', $slug)->firstOrFail();
        return view('web.product-details', compact('product'));
    }

    public function productsByCategory($categorySlug)
    {
        // Logic to fetch products by category
        // For example:
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $categories = Category::all();
        $products = $category->products()->paginate(9);

        // Pass the category and products data to the view
        return view('web.products', compact('category', 'products','categories'));
    }

        public function showProductBySlug($categorySlug, $productSlug)
    {
        // Find the category based on its slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Find the product based on its slug and category
        $product = Product::where('slug', $productSlug)->where('category_id', $category->id)->firstOrFail();

        // Pass the product data to the view
        return view('web.products', compact('product'));
    }
}
