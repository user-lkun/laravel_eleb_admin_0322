<?php

namespace App\Http\Controllers;

use App\Models\EventPrizes;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('start/index',compact('events'));
    }
    public function lottery(Request $request){
       $event_id = $request->id;
       $evenPrizes = DB::table('event_prizes')->where('events_id',$event_id)->get();
       $prizes = [];//保存活动奖品ID
       foreach ($evenPrizes as $val){
           $prizes[]=$val->id;
       }

        $shops = DB::table('event_shops')->where('events_id',$event_id)->get();
        $shops_id = [];//保存商家id
        foreach ($shops as $val){
            $shops_id[]=$val->shop_id;
        }
        $res = [];
        if(count($prizes)>count($shops_id)){//判断商家跟奖品的个数
                    for ($i=0;$i<count($shops_id);++$i){

                        shuffle($prizes);
                        $prize = array_pop($prizes);
                        $res[$prize] =$shops_id[$i] ;

            }
        }else{

            for ($i=0;$i<count($prizes);++$i){
                shuffle($shops_id);
                $shop_id = array_pop($shops_id);

                $res[$prizes[$i]] =$shop_id;
            }
        }
        //将抽奖结果保存在奖品表里面  并改变抽奖状态
        DB::table('events')->where('id',$event_id)->update(['is_prize'=>1]);
        foreach ($res as $key=>$val){
            DB::table('event_prizes')->where('id',$key)->where('events_id',$event_id)->update(['shop_id'=>$val]);
        }
        session()->flash('success','抽奖完成');
        return view('start/index');

    }
    public function result(Events $event){
        return view('start/result',compact('event'));
    }
}
