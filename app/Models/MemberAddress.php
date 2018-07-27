<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberAddress extends Model
{
    protected $fillable = [
        'member_id',
        'province',
        'city',
        'county',
        'address',
        'tel',
        'name',
        'is_default'
    ];
}
