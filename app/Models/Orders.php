<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
        'sn',
        'province',
        'city',
        'county',
        'address',
        'tel',
        'name',
        'total',
        'status',
        'out_trade_no',

    ];
    //建立订单表和商家表的关系 一对一
    public function shops(){
        return $this->hasOne(Shops::class,'id','shop_id');
    }

}
