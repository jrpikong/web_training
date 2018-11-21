<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizDetail;
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
        $quizzes = Quiz::with('quiz_detail')->get();

        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $quizzes,
        ]);
    }
}
