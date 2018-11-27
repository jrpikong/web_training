<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getTraining()
    {
        $trainings = Training::all();

        return view('training', compact('trainings'));
    }

    public function FollowTraining($id)
    {
        $training = Training::find($id);
        return view('follow_training', compact('training'));
    }
}
