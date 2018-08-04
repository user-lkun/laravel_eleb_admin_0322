<?php

namespace App\Http\Controllers;

use App\Models\Navs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class NavsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){

        $navs = Navs::paginate(10);
        return view('navs/index',compact('navs'));
    }
    public function create(){
        $navs = Navs::all();
        $permissions = Permission::all();
        return view('navs/create',compact('navs','permissions'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10',
            'url' => 'required',
            'permission_id' => 'required',
        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
            'url.required'=>'路由地址不能为空',
            'permission_id.required'=>'所属权限不能为空',

        ]);

        Navs::create([
            'name'=>$request->name,
            'pid'=>$request->pid,
            'url'=>$request->url,
            'permission_id'=>$request->permission_id,
        ]);
        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect(route('navs.index'));
    }
    public function edit(Navs $nav){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $navs = Navs::all();
        $permissions = Permission::all();
        return view('navs/edit',compact('nav','navs','permissions'));
    }
    public function update(Navs $nav,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $this->validate($request, [
            'name' => 'required|max:10',
            'url' => 'required',
            'permission_id' => 'required',
        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
            'url.required'=>'路由地址不能为空',
            'permission_id.required'=>'所属权限不能为空',

        ]);
        $nav->update([
            'name'=>$request->name,
            'pid'=>$request->pid,
            'url'=>$request->url,
            'permission_id'=>$request->permission_id,
        ]);
        //修改成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect(route('navs.index'));
    }
    public function destroy(Navs $nav){
        if (!Auth::user()->can('删除')){
            return view('public');
        }
        $res = Navs::where('pid',$nav->id)->count();
       if ($res!=0){
           //该分类下面还存在分类
           session()->flash('danger','删除失败,该分类下还存在分类!');
           return redirect(route('navs.index'));
       }else{
           $nav->delete(); //
           //修改成功,设置提示信息
           session()->flash('success','删除成功');
           return redirect(route('navs.index'));
       }

    }
}
