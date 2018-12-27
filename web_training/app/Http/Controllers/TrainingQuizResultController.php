<?php

namespace App\Http\Controllers;

use App\TrainingQuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingQuizResultController extends Controller
{
    public function historyTraining()
    {
        $idUser = Auth::user()->id;
        $histories = TrainingQuizResult::with('quiz')->where('user_id', $idUser)->orderBy('quiz_id','desc')->paginate(10);
        return view('history_training', compact('histories'));
    }
}
