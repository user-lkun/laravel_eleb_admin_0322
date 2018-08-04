<?php

namespace App\Http\Controllers;

use App\Models\EventPrizes;
use App\Models\Events;
use Illuminate\Http\Request;

class EventPrizesController extends Controller
{
    public function index(){
       $eventprizes = EventPrizes::all();
       return view('eventprizes/index',compact('eventprizes'));
    }
    public function createlist(){
        $events = Events::all();
        return view('eventprizes/createlist',compact('events'));
    }
    public function create(Request $request){
        $events = Events::where('id',$request->id)->first();
        return view('eventprizes/create',compact('events'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:10',
            'description' => 'required',

        ],[
            'name.required'=>'奖品名称不能为空',
            'name.max'=>'奖品名称不能超过10个字',
            'description.required'=>'	奖品描述不能为空',


        ]);

        EventPrizes::create([
            'events_id'=>$request->events_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'shop_id'=>$request->shop_id,

        ]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("eventprizes");
    }

    public function edit(EventPrizes $eventprize)
    {
        $events = Events::all();
        //将开了奖后中奖的商家id传过去
        return view('eventprizes/edit',compact('events','eventprize'));
    }

    public function update(EventPrizes $eventprize,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'description' => 'required',

        ],[
            'name.required'=>'奖品名称不能为空',
            'name.max'=>'奖品名称不能超过10个字',
            'description.required'=>'	奖品描述不能为空',


        ]);

        $eventprize->update([
            'events_id'=>$request->events_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'shop_id'=>$request->shop_id,

        ]);

        //修改成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect("eventprizes");
    }
    public function destroy(EventPrizes $eventprize){
        $eventprize->delete();
        //添加成功,设置提示信息
        session()->flash('success','删除成功');
        return redirect("eventprizes");
    }
}
