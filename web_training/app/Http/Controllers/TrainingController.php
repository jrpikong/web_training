<?php

namespace App\Http\Controllers;

use App\Training;
use App\TrainingQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addTraining()
    {
        return view('admin.training.add_training');
    }

    public function submitTraining(Request $request)
    {
        $request->validate([
            'file_module' => 'required|file|max:1024',
        ]);

        $fileName = "module".time().'.'.request()->file_module->getClientOriginalExtension();

        $pathName = $request->file_module->storeAs('public/training',$fileName);

        $trainingModel = new Training();
        $trainingModel->training_name = $request->input('training_name');
        $trainingModel->difficulty = $request->input('diffiluct');
        $trainingModel->descriptions = $request->input('descriptions');
        $trainingModel->file_module = $pathName;
        $trainingModel->status = $request->input('status');
        $trainingModel->save();

        try {
            return back()->with('success','You have successfully upload training.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error upload training.');
        }

    }
}
