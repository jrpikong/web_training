<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingQuizChoice extends Model
{
    protected $fillable = ['question_id','choice','correct_answer'];
}
