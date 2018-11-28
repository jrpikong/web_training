<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingQuizQuestion extends Model
{
    //

    public function choice()
    {
        return $this->hasMany(TrainingQuizChoice::class, 'question_id', 'id');
    }
}
