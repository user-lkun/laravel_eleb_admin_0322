<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrizes extends Model
{
    protected $fillable = [
        'events_id',
        'name',
        'description',
        'shop_id',

    ];

    //    建立奖品表和活动表的关系 一对一
    public function events(){
        return $this->hasOne(Events::class,'id','events_id');
    }
    //建立奖品表和商家表的关系 一对一
    public function shops(){
        return $this->hasOne(Shops::class,'id','shop_id');
    }
}
