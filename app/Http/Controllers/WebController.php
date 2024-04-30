<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

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
        return view('web.products');
    }

    public function careers()
    {
        $careers = Career::all();
        return view('web.careers', compact('careers'));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function productDetails()
    {
        return view('web.product-details');
    }



}
