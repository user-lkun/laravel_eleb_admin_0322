<?php

namespace App\Http\Controllers;

use App\Models\Activies;
use Illuminate\Http\Request;

class ActiviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(Request $request){

        $wheres = [];
        $keywords = [];
        if ($request->status=='end'){
            $wheres[]=['end_time','<',time()];
            $keywords['status']='end';
        }
        if($request->status=='ing'){
            $wheres[]=['end_time','>',time()];
            $wheres[]=['start_time','<',time()];
            $keywords['status']='ing';
        }
        if ($request->status=='not_start'){
            $wheres[]=['start_time','>',time()];
            $keywords['status']='not_start';
        }

        $activies = Activies::where($wheres)->paginate(2);
        return view('activies/index',compact('activies','keywords'));
    }
    public function create(){
        return view('activies/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:20',
            'start_time' => 'required',
            'end_time' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'content' => 'required',


        ],[
            'title.required'=>'活动名称不能为空',
            'title.max'=>'活动名称不能超过20个字',
            'start_time.required'=>'	活动开始时间不能为空',
            'end_time.required'=>'活动结束时间不能为空',
            'content.required'=>'活动内容不能为空',

        ]);

        if ($request->start_time>$request->end_time){
            session()->flash('danger','开始时间不能大于结束时间');
            return redirect(url()->previous());
        }
        $start  = strtotime($request->start_time);
        $end  = strtotime($request->end_time);
        Activies::create([
            'title'=>$request->title,
            'start_time'=>$start,
            'end_time'=>$end,
            'content'=>$request->content,
        ]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("activies");
    }

    public function edit(Activies $activy){
//        dd(date('Y-m-d H:i:s',$activy->start_time));
        return view('activies/edit',compact('activy'));
    }
    public function update(Request $request,Activies $activy){
        $this->validate($request, [
            'title' => 'required|max:20',
            'start_time' => 'required',
            'end_time' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'content' => 'required',


        ],[
            'title.required'=>'活动名称不能为空',
            'title.max'=>'活动名称不能超过20个字',
            'start_time.required'=>'	活动开始时间不能为空',
            'end_time.required'=>'活动结束时间不能为空',
            'content.required'=>'活动内容不能为空',

        ]);

        if ($request->start_time>$request->end_time){
            session()->flash('danger','开始时间不能大于结束时间');
            return redirect(url()->previous());
        }

        $start  = strtotime($request->start_time);
        $end  = strtotime($request->end_time);
        $activy->update([
            'title'=>$request->title,
            'start_time'=>$start,
            'end_time'=>$end,
            'content'=>$request->content,
        ]);

        //添加成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect("activies");
    }
    public function destroy(Activies $activy){
        $activy->delete();
        session()->flash('success','删除成功');
        return redirect("activies");
    }

    public function show(Activies $activy){
        return view('activies/show',compact('activy'));
    }
}
