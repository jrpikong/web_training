<?php

namespace App\Http\Controllers;

use App\TrainingQuiz;
use App\TrainingQuizChoice;
use App\TrainingQuizQuestion;
use App\TrainingQuizResult;
use App\TrainingQuizResultDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TrainingQuizController extends Controller
{
    //
    public function AddQuizTraining($id_training)
    {
        return view('admin.training.quiz_training_form',compact('id_training'));
    }

    public function edit($id)
    {
        $training_quiz = TrainingQuiz::where('training_id',$id)->first();
        return view('admin.training.edit_quiz',compact('training_quiz'));
    }
    public function SubmitQuizTraining(Request $request){
        $waktu = $request->waktu_pengerjaan;
        $title = $request->title;
        $sort_description = $request->sort_description;
        $questions = $request->questions;
        $training_id = $request->idQuiz;
        /*Insert Training Quiz*/
        $training_quizzes = new TrainingQuiz();
        $training_quizzes->training_id = $training_id;
        $training_quizzes->time = $waktu;
        $training_quizzes->title = $title;
        $training_quizzes->sort_description = $sort_description;
        $training_quizzes->save();
        $quiz_choice = [];
        foreach ($questions as $key => $question) {
            $TrainingQuizQuestion = new TrainingQuizQuestion();
            $TrainingQuizQuestion->quiz_id = $training_quizzes->id;
            $TrainingQuizQuestion->question = $question['pertanyaan'];
            $TrainingQuizQuestion->correct_answer = $question['kunci_paten'];
            $TrainingQuizQuestion->save();

            foreach ($question['pilihan'] as $value) {
                $quiz_choice[] = [
                    'question_id' => $TrainingQuizQuestion->id,
                    'choice' => $value['value']
                ];
            }
        }

        $TrainingQuizChoice = new TrainingQuizChoice();
        $a = $TrainingQuizChoice->insert($quiz_choice);
        if (!$a) {
            return response()->json([
                'status' => '04',
                'message' => 'Insert Gagal',
                'data' => $a,
            ]);
        }

        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $a,
        ]);
    }

    public function SubmitQuizTrainingEdit(Request $request)
    {

        /*Update Quiz*/
        $training_quizzes = TrainingQuiz::find($request->idQuiz);
        $training_quizzes->time = $request->waktu_pengerjaan;
        $training_quizzes->title = $request->title;
        $training_quizzes->sort_description = $request->sort_description;
        $training_quizzes->save();

//        if ($request->delete) {
        dd($request->delete);
            foreach ($request->delete as $value) {
                dd($value);
            }
//        }

        foreach ($request->questions as $i => $question) {
            if ($question['id']) {
                $TrainingQuizQuestion = TrainingQuizQuestion::find($question['id']);
                $TrainingQuizQuestion->question = $question['question'];
                $TrainingQuizQuestion->correct_answer = $question['correct_answer'];
                $TrainingQuizQuestion->save();
                foreach ($question['pilihan'] as $value){
                    $TrainingQuizChoice = TrainingQuizChoice::find($value['id']);
                    $TrainingQuizChoice->choice = $value['value'];
                    $TrainingQuizChoice->save();
                }
            }else{
                $TrainingQuizQuestion = new TrainingQuizQuestion();
                $TrainingQuizQuestion->quiz_id = $request->idQuiz;
                $TrainingQuizQuestion->question = $question['question'];
                $TrainingQuizQuestion->correct_answer = $question['correct_answer'];
                $TrainingQuizQuestion->save();

                foreach ($question['pilihan'] as $value){
                    $TrainingQuizChoice = new TrainingQuizChoice();
                    $TrainingQuizChoice->question_id = $TrainingQuizQuestion->id;
                    $TrainingQuizChoice->choice = $value['value'];
                    $TrainingQuizChoice->save();
                }
                
            }
        }

    }

    public function FollowTest($id)
    {
        $training_quiz = TrainingQuiz::where('training_id',$id)->first();
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

        /*Prepare to Insert*/
        DB::beginTransaction();

        $quizResult = new TrainingQuizResult();
        $quizResult->user_id = $user_id;
        $quizResult->quiz_id = $request->input('quiz_id');
        $quizResult->grade = $totalCorrect;
        $quizResult->repeat = 1;
        $quizResult->save();
        $dataAnswers = [];
        foreach ($answers as $i => $answer) {
            $dataAnswers[] = [
                'quiz_result_id' => $quizResult->id,
                'question_id' => $answer[0]['question_id'],
                'answers' => $answer[0]['answer'],
                'correct' => $answer[0]['correct'],
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];
        }
        $quizResultDetail = new TrainingQuizResultDetail();
        $insert = $quizResultDetail->insert($dataAnswers);
        if(!$insert){
            DB::rollBack();
            return response()->json([
                'status' => '04',
                'message' => 'Insert Gagal',
                'data' => $insert,
            ]);
        }
        DB::commit();
        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $insert,
        ]);
    }
}
