<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(8)->get();
        $sliders = Slider::where('status', '=', 1)->get();
        return view('welcome', compact('products','sliders'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function aboutUs()
    {
        return view('about_us');
    }
}
