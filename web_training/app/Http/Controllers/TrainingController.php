<?php

namespace App\Http\Controllers;

use App\Exports\TrainingQuizExport;
use App\Training;
use App\TrainingQuiz;
use App\TrainingQuizResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
                'file_module' => 'file|max:10120',
            ]);
            $fileName = "module".time().'.'.request()->file_module->getClientOriginalExtension();
            $pathName = $request->file_module->storeAs('public/training',$fileName);
            $trainingModel->file_module = 'training/'.$fileName;
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
            'file_module' => 'required|file|max:10120',
        ]);

        $fileName = "module".time().'.'.request()->file_module->getClientOriginalExtension();
        $pathName = $request->file_module->storeAs('public/training',$fileName);

        $trainingModel = new Training();
        $trainingModel->training_name = $request->input('training_name');
        $trainingModel->difficulty = $request->input('diffiluct');
        $trainingModel->descriptions = $request->input('descriptions');
        $trainingModel->file_module = 'training/'.$fileName;
        $trainingModel->status = $request->input('status');
        $trainingModel->save();

        try {
            return back()->with('success','You have successfully upload training.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error upload training.');
        }
    }

    public function reportTraining(Request $request)
    {
        if ($request->export) {
            return $this->exportExcel($request);
        }
        $reports = TrainingQuizResult::select('user_id', DB::raw('count(*) as total'),'users.*')
        ->join('users', 'users.id', 'training_quiz_results.user_id')->groupBy('user_id')->orderBy('name','asc')->paginate(15);
        return view('admin.training.report',compact('reports'));
    }

    public function showTrainingReport($id)
    {
        $reports = TrainingQuizResult::where('user_id','=',$id)->with('users','quiz')->orderBy('created_at')->paginate(15);
        return view('admin.training.show_report',compact('reports'));
    }

    /**
     * @param $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    private function exportExcel($request)
    {
        $fileName = Carbon::now()->toDateTimeString().'.xls';
//        return Excel::download(new TrainingQuizExport($request), $fileName.'.csv');

        Excel::store(new TrainingQuizExport($request), $fileName,'public');
        return redirect( Storage::url("{$fileName}" ));
    }
}
