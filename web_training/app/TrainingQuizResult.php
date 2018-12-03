<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingQuizResult extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'grade',
        'repeat',
    ];

    public function quiz()
    {
        return $this->belongsTo(Training::class, 'quiz_id', 'id');
    }
}
