<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function index()
    {

        return view('admin.quiz.index');
    }

    public function form()
    {
        return view('admin.quiz.form');
    }

    public function submitSoal(Request $request)
    {
        Log::info($request);



    }
}
