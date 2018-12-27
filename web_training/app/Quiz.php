<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'waktu',
        'status',
        'type',
    ];

    public function quiz_detail()
    {
        return $this->hasMany(QuizDetail::class,'quize_id','id');
    }
}
