<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(8)->get();
        return view('welcome', compact('products'));
    }

    public function faq()
    {
        return view('faq');
    }
}
