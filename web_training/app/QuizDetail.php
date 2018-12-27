<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizDetail extends Model
{
    protected $fillable = [
        'quize_id',
        'questions',
        'status',
        'answer',
        'choice_a',
        'type_of_choice_a',
        'choice_b',
        'type_of_choice_b',
        'choice_c',
        'type_of_choice_c',
        'choice_d',
        'type_of_choice_d'
    ];
}
