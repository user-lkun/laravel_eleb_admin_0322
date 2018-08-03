<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventShops extends Model
{
    protected $fillable = [
        'events_id', 'shop_id',
    ];
//    建立报名表和活动表的关系 一对一
    public function events(){
        return $this->hasOne(Events::class,'id','events_id');
    }
    //建立报名表和商家表的关系 一对一
    public function shops(){
        return $this->hasOne(Shops::class,'id','shop_id');
    }
}
