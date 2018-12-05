<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizDetail;
use App\ResultPersonalQuiz;
use App\ResultPersonalQuizDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz.index',compact('quizzes'));
    }

    public function form()
    {
        return view('admin.quiz.form');
    }

    public function submitSoal(Request $request)
    {
        $quis = new Quiz();
        $quis->waktu = $request->input('waktu_pengerjaan');
        $quis->status = $request->input('status_kuis');
        $quis->type = $request->input('tipe_kuis');

        $quis->save();

        $quisDetail = new QuizDetail();
        $questions = $request->input('questions');
        foreach ($questions as $question) {
            $dataQuestions[] = [
                'quize_id' => $quis->id,
                'questions' => $question['pertanyaan'],
                'status' => $question['status_soal'],
                'answer' => $question['jawaban'],
                'choice_a' => $question['pilihan_a'],
                'type_of_choice_a' => $question['type_of_choice_a'],
                'choice_b' => $question['pilihan_b'],
                'type_of_choice_b' => $question['type_of_choice_b'],
                'choice_c' => $question['pilihan_c'],
                'type_of_choice_c' => $question['type_of_choice_c'],
                'choice_d' => $question['pilihan_d'],
                'type_of_choice_d' => $question['type_of_choice_d'],
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];
        }
        $insert = $quisDetail->insert($dataQuestions);
        if(!$insert){
            return response()->json([
                'status' => '04',
                'message' => 'Insert Failed',
                'data' => $insert,
            ]);
        }
        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $insert,
        ]);
    }

    public function getQiz(Request $request)
    {
        $quizzes = Quiz::with('quiz_detail')->where('type','=',$request->type)->first();

        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $quizzes,
        ]);
    }

    /*Users*/


    public function startQuiz(){
        $data = ResultPersonalQuiz::where('user_id','=',Auth::user()->id)->first();
        return view('quiz_personal_test',compact('data'));
    }

    public function postPersonalQuiz(Request $request)
    {
        $resultPersonal = new ResultPersonalQuiz();
        $resultPersonal->user_id = Auth::user()->id;
        $resultPersonal->quiz_id = $request->input('id_quiz');
        $resultPersonal->save();
//        dd('ds');
        $answerData = [];
        foreach ($request->answers as $key => $answer) {
            $answerData[] = [
                'quiz_result_id' => $resultPersonal->id,
                'question_id' => $answer[0]['id_questions'],
                'answers' => $answer[0]['choice'],
                'type_of_choice' => $answer[0]['type_of_choice'] ,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];
        }
        $resultPersonalDetail = new ResultPersonalQuizDetail();


        $insert = $resultPersonalDetail->insert($answerData);

        $getResult = ResultPersonalQuizDetail::select(
                DB::raw( 'SUM(`type_of_choice` LIKE \'%Melankolis%\') as Melankolis'),
                DB::raw( 'SUM(`type_of_choice` LIKE \'%Plegmati%\') as Plegmati'),
                DB::raw( 'SUM(`type_of_choice` LIKE \'%Kolerik%\') as Kolerik'),
                DB::raw( 'SUM(`type_of_choice` LIKE \'%Sanguinis%\') as Sanguinis')
            )
            ->where('quiz_result_id', '=', $resultPersonal->id)
            ->groupBy('quiz_result_id')
            ->get();

        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $getResult,
        ]);

    }

}
