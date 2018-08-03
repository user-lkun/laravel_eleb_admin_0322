<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Navs extends Model
{
    protected $fillable = [
        'name', 'url', 'permission_id','pid'
    ];
    //菜单和权限的关系 1对多(反)
    public function permission(){
        return $this->belongsTo(Permission::class,'id','id');
    }

    public static function getNavsHtml(){//拼接导航html
        $html = '';
        foreach(self::where('pid',0)->get() as $pid){
            $children_html = '';
            foreach(self::where('pid',$pid->id)->get() as $val){
                if (auth()->user()->can($val->permission->name)){
                    $children_html.=' <li><a href="'.route($val->url).'">'.$val->name.'</a></li>';
                }
            }
            if (empty($children_html)) continue;
            $html.='<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$pid->name.' <span class="caret"></span></a>
                        <ul class="dropdown-menu">';

            $html.=$children_html;
            $html.='</ul>
                 </li>';
        }
        return $html;
    }
}
