<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('home',compact('user'));
    }

    public function term_and_condition()
    {
        return view('term_and_condition');
    }

    public function term_and_condition_post(Request $request)
    {
        if($request->has('img_digital_signature') === true){
            $user = Auth::user();
            $user->addMediaFromRequest('img_digital_signature')->toMediaCollection('img_digital_signature');
            return view('preview_user',compact('user'));
        }
    }
}
