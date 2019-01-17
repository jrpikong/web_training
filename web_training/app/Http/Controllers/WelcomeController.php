<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Page;
use App\Product;
use App\Slider;
use App\Video;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(8)->get();
        $sliders = Slider::where('status', '=', 1)->get();
        $videos = Video::whereIn('page', ['all','home'])->get();
        return view('welcome', compact('products','sliders','videos'));
    }

    public function faq()
    {
        $faq = Faq::where('status','=',1)->get();
        return view('faq',compact('faq'));
    }

    public function aboutUs()
    {
        $about = Page::where('slug', 'like', '%about%')->first();
        $videos = Video::whereIn('page', ['all','about_us'])->get();
        return view('about_us',compact('about','videos'));
    }
}
