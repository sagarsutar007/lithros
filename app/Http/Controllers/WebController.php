<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Category;
use App\Models\Product;
use App\Models\Opening;

class WebController extends Controller
{
    public function index()
    {

        return view('web.home');
    }

    public function company()
    {
        return view('web.company');
    }


    public function legals()
    {
        return view('web.legals');
    }

    public function gallery()
    {
        return view('web.gallery');
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
        $openings = Opening::paginate(9);
        return view('web.openings', compact('openings'));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function showBySlug($slug)
    {   
        $product = Product::with('specifications')->where('slug', $slug)->firstOrFail();
        return view('web.product-details', compact('product'));
    }



}
