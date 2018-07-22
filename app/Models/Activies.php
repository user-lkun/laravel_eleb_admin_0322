<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activies extends Model
{
    protected $fillable = [
        'title', 'content', 'start_time','end_time'
    ];
}
