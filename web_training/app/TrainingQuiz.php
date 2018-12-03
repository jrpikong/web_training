<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingQuiz extends Model
{
    protected $fillable = [
        'training_id','time','title','sort_description'
    ];
}
