<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public  function index(){
        $events = Events::all();
        return view('events/index',compact('events'));
    }
    public function create(){
        return view('events/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:30',
            'signup_start' => 'required',
            'signup_end' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'content' => 'required',


        ],[
            'title.required'=>'活动名称不能为空',
            'title.max'=>'活动名称不能超过30个字',
            'signup_start.required'=>'	活动开始时间不能为空',
            'signup_end.required'=>'活动结束时间不能为空',
            'prize_date.required'=>'活动开奖时间不能为空',
            'signup_num.required'=>'活动人数限制不能为空',
            'content.required'=>'活动内容不能为空',

        ]);

        if ($request->signup_start>$request->signup_end){
            session()->flash('danger','开始时间不能大于结束时间');
            return redirect(url()->previous());
        }
        if ($request->prize_date<$request->signup_end){
            session()->flash('danger','开奖时间不能小于结束时间');
            return redirect(url()->previous());
        }
        Events::create([
            'title'=>$request->title,
            'signup_start'=>strtotime($request->signup_start),
            'signup_end'=>strtotime($request->signup_end),
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
            'is_prize'=>0,//默认未开奖
            'content'=>$request->content,
        ]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("events");
    }
    public function edit(Events $event){
        return view('events/edit',compact('event'));
    }
    public function update(Events $event ,Request $request){
        $this->validate($request, [
            'title' => 'required|max:30',
            'signup_start' => 'required',
            'signup_end' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'content' => 'required',


        ],[
            'title.required'=>'活动名称不能为空',
            'title.max'=>'活动名称不能超过30个字',
            'signup_start.required'=>'	活动开始时间不能为空',
            'signup_end.required'=>'活动结束时间不能为空',
            'prize_date.required'=>'活动开奖时间不能为空',
            'signup_num.required'=>'活动人数限制不能为空',
            'content.required'=>'活动内容不能为空',

        ]);

        if ($request->signup_start>$request->signup_end){
            session()->flash('danger','开始时间不能大于结束时间');
            return redirect(url()->previous());
        }
        if ($request->prize_date<$request->signup_end){
            session()->flash('danger','开奖时间不能小于结束时间');
            return redirect(url()->previous());
        }
        $event->update([
            'title'=>$request->title,
            'signup_start'=>strtotime($request->signup_start),
            'signup_end'=>strtotime($request->signup_end),
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
            'is_prize'=>$request->is_prize,
            'content'=>$request->content,
        ]);

        //修改成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect("events");
    }
    public function destroy(Events $event){
        $event->delete();
        //修改成功,设置提示信息
        session()->flash('success','删除成功');
        return redirect("events");
    }

    public function show(Events $event){
        return view('events/show',compact('event'));
    }
}
