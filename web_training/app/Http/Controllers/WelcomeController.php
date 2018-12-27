<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Page;
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
        $faq = Faq::where('status','=',1)->get();
        return view('faq',compact('faq'));
    }

    public function aboutUs()
    {
        $about = Page::where('slug', 'like', '%about%')->first();
        return view('about_us',compact('about'));
    }
}
