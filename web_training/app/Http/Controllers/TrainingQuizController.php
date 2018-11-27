<?php

namespace App\Http\Controllers;

use App\TrainingQuiz;
use App\TrainingQuizQuestion;
use App\TrainingQuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TrainingQuizController extends Controller
{
    //

    public function FollowTest($id)
    {
        $training_quiz = TrainingQuiz::find($id);
        return view('follow_training_quiz',compact('training_quiz'));
    }


    public function getTrainingQuiz($id)
    {
        $questions = TrainingQuizQuestion::where('quiz_id',$id)->with('choice')->get();

        return response()->json([
            'status' => '00',
            'message' => 'List Questions',
            'data' => $questions,
        ]);
    }

    public function postQuiz(Request $request)
    {
        Log::info($request);
        $answers = $request->input('answers');
        $user_id = Auth::user()->id;
        $totalCorrect = $request->input('total_correct');
        $quizResult = new TrainingQuizResult();
        $quizResult->user_id = $user_id;
        $quizResult->quiz_id = $request->input('quiz_id');
        $quizResult->grade = $totalCorrect;
        $quizResult->repeat = 1;

        $quizResult->save();
        foreach ($answers as $i => $answer) {
            dd($answer[0]['answer']);
        }
    }
}
