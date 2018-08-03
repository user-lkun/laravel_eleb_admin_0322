<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\OrderGoods;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
   public function index(Request $request){
       $wheres = [];
       $keywords = [];
       if ($request->shop_id){
           $wheres[]=['shop_id',$request->shop_id];
           $keywords['shop_id']=$request->shop_id;
       }
//       if ($request->start_time){
//           $wheres[]=['created_at','>',$request->start_time];
////           $keywords['start_time']=$request->start_time;
//       }
//       if ($request->end_time){
//           $wheres[]=['created_at','<',$request->end_time];
////           $keywords['end_time']=$request->end_time;
//       }
       if ($request->start_time && $request->end_time==null){
           $keywords['start_time']=$request->start_time;
           $rows = DB::select("select goods_id,sum(amount)as amount from order_goods WHERE created_at>'$request->start_time' GROUP BY goods_id ORDER BY amount DESC ");
       }elseif($request->end_time && $request->start_time==null){

           $keywords['end_time']=$request->end_time;
           $rows = DB::select("select goods_id ,sum(amount) as amount from order_goods  where  created_at<'$request->end_time' group by goods_id");
       }elseif($request->start_time && $request->end_time){
           $keywords['start_time']=$request->start_time;
           $keywords['end_time']=$request->end_time;
           $rows = DB::select("select goods_id ,sum(amount) as amount from order_goods  where  created_at>'$request->start_time' and created_at<'$request->end_time' group by goods_id");
       }else{
           $rows = DB::select("select goods_id ,sum(amount) as amount from order_goods  group by goods_id");
       }
//        dd($keywords);
       $menus = Menu::where($wheres)->paginate(5);
        foreach ($rows as $row){
            foreach ($menus as $menu){
                if ($row->goods_id==$menu->id){
                    $menu['amount']=$row->amount;
                }
            }
        }
//        dd($menus);
//       $menus->paginate(5);
//       dd($menus);
       $shops = Shops::all();
       return view('menus/index',compact('menus','shops','keywords'));
   }
}
