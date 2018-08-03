<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Shops;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
        if ($request->start_time){
            $wheres[]=['created_at','>',$request->start_time];
            $keywords['start_time']=$request->start_time;
        }
        if ($request->end_time){
            $wheres[]=['created_at','<',$request->end_time];
            $keywords['end_time']=$request->end_time;
        }
        $orders = Orders::where($wheres)
            ->where('status','!=',-1)
            ->paginate(2);
        $count = Orders::where($wheres)
            ->where('status','!=',-1)
            ->count();
        $shops = Shops::all();
        return view('orders/index',compact('orders','shops','count','keywords'));
    }

}
