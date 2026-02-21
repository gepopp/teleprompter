<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $casts = ['questions' => 'array', 'event_date' => 'datetime'];
}
