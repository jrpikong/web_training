<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultPersonalQuizDetail extends Model
{
    //

    protected $fillable = [
        'quiz_result_id',
        'question_id',
        'answers',
        'type_of_choice',
    ];

    public function result_personal_quiz()
    {
        return $this->hasMany(ResultPersonalQuiz::class);
    }
}
