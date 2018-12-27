<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultPersonalQuiz extends Model
{
    //
    protected $fillable = ['user_id', 'quiz_id'];

    public function personality_detail()
    {
        return $this->belongsTo(ResultPersonalQuizDetail::class, 'quiz_result_id', 'id');
    }
}
