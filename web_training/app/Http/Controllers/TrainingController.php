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

    public function edit($id)
    {
        $training = Training::find($id);
        return view('admin.training.edit_training', compact('training'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'training_name' => 'required',
        ]);

        $trainingModel = Training::find($id);
        $trainingModel->training_name = $request->input('training_name');
        $trainingModel->difficulty = $request->input('diffiluct');
        $trainingModel->descriptions = $request->input('descriptions');
        if ($request->file_module) {
            $request->validate([
                'file_module' => 'file|max:1024',
            ]);
            $fileName = "module".time().'.'.request()->file_module->getClientOriginalExtension();

            $pathName = $request->file_module->storeAs('public/training',$fileName);
            $trainingModel->file_module = $pathName;
        }

        $trainingModel->status = $request->input('status');
        $trainingModel->save();

        try {
            return back()->with('success','You have successfully upload training.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error upload training.');
        }
    }

    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();

        try {
            return back()->with('success','You have successfully delete training.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error delete training.');
        }
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
