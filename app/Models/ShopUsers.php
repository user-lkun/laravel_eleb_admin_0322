<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopUsers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'rememberToken',
        'status',
        'shop_id',
    ];

    //建立商家表和店铺表的关系 一对一(某一个商家只对应一个店铺)
    public function shops(){
        return $this->hasOne(Shops::class, 'id', 'shop_id');
    }
}
