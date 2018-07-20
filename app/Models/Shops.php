<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $fillable = [
        'shop_category_id',
        'shop_name',
        'shop_img',
        'shop_rating',
        'brand',
        'on_time',
        'fengniao',
        'bao','piao',
        'zhun',
        'start_send',
        'send_cost',
        'notice',
        'discount',
        'status',
    ];
    //建立店铺表和分类表的关系 一对一
    public function shop_categories(){
        return $this->hasOne(Shop_categories::class,'id','shop_category_id');

    }
}
