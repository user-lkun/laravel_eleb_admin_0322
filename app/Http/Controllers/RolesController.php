<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){
        $roles = Role::paginate(4);
        return view('roles/index',compact('roles'));
    }
    public function create(){
        $permissions = Permission::all();
        return view('roles/create',compact('permissions'));
    }
    public function store(Request $request){

        $role = Role::create(['name'=>$request->name]);//添加角色
        $role->givePermissionTo($request->permission_id);//给角色添加权限
        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect(route('roles.index'));
    }
    public function edit(Role $role){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $permissions = Permission::all();
        $mypermissions = $role->permissions;//获取自身权限
//        dd($mypermissions);
        return view('roles/edit',compact('role','permissions','mypermissions'));
    }
    public function update(Role $role,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $role->update(['name'=>$request->name]);

        $role->syncPermissions($request->permission_id);//给角色重置权限
        session()->flash('success','修改成功');
        return redirect(route('roles.index'));
    }
    public function show(Role $role){
        $mypermissions = $role->permissions;//获取自身权限
        return view('roles/show',compact('role','mypermissions'));
    }
    public function destroy(Role $role){
        if (!Auth::user()->can('删除')){
            return view('public');
        }
        $role->delete();
        session()->flash('success','删除成功');
        return redirect(route('roles.index'));
    }
}
