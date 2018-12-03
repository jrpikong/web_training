<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
        protected $fillable = [
        'training_name','diffilucty','descriptions','file_module', 'status',
        ];
}
