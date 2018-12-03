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
}
