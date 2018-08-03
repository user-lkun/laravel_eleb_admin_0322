<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RbacsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){

        $permissions = Permission::paginate(10);
        return view('rbacs/index',compact('permissions'));
    }
    public function create(){

        return view('rbacs/create');
    }
    public function store(Request $request){

        Permission::create(['name'=>$request->name]);
        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect(route('rbacs.index'));
    }
    public function edit(Permission $rbac){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        return view('rbacs/edit',compact('rbac'));
    }
    public function update(Permission $rbac,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $rbac->update(['name'=>$request->name]);
        session()->flash('success','修改成功');
        return redirect(route('rbacs.index'));
    }
    public function destroy(Permission $rbac){
        if (!Auth::user()->can('删除')){
            return view('public');
        }
        $rbac->delete();
        session()->flash('success','删除成功');
        return redirect(route('rbacs.index'));
    }

}
