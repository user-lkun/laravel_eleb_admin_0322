<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }

    public function index(){
//        $shop_users = ShopUsers::paginate(3);
        $admins = Admins::all();
        return view('admins/index',compact('admins'));
    }

    public function create(){
        return view('admins/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10',
            'password' => 'required|min:6',
            'repassword' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'email' => 'required|unique:admins',
            'captcha' => 'required|captcha',

        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
            'password.required'=>'密码不能为空',
            'repassword.required'=>'确认密码不能为空',
            'password.min'=>'密码不能小于6位数',
//            'new_password.min'=>'密码不能小于6位数',
//            'repassword.min'=>'密码不能小于6位数',


            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',

            'captcha.required'=>'验证码不能为空!',
            'captcha.captcha'=>'验证码错误!',

        ]);

        if ($request->password!=$request->repassword){
            session()->flash('danger','两次输入密码不一样!');
            return redirect(url()->previous());
        }

        //对密码进行加密处理
        $password = bcrypt($request->password);
        Admins::create([
            'name'=>$request->name,
            'password'=>$password,
            'email'=>$request->email,
           ]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("admins");
    }

    public function edit(Admins $admin){
        return view('admins/edit',compact('admin'));
    }

    public function update( Request $request,Admins $admin){
        $old_email = $request->email;//原邮箱可以不填,就不用更新邮箱
        $this->validate($request, [
            'name' => 'required|max:10',
//            'password' => 'required|min:6',
//            'repassword' => 'required',

            'email' => 'required|unique:users,email,'.$old_email.',email',

            'captcha' => 'required|captcha',

        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
//            'password.required'=>'密码不能为空',
//            'repassword.required'=>'确认密码不能为空',
//            'password.min'=>'密码不能小于6位数',
//            'new_password.min'=>'密码不能小于6位数',
//            'repassword.min'=>'密码不能小于6位数',


            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',

            'captcha.required'=>'验证码不能为空!',
            'captcha.captcha'=>'验证码错误!',

        ]);
        if ($request->oldpassword!=null){//填写了旧密码
            if (!Hash::check($request->oldpassword,$admin->password)){
                session()->flash('danger','旧密码填写错误!');
                return redirect(url()->previous());
            }
            if ($request->password!=$request->repassword){
                session()->flash('danger','确认密码输入错误!');
                return redirect(url()->previous());
            }
            //对密码进行加密处理
            $password = bcrypt($request->password);
            $admin->update([
                'name'=>$request->name,
                'password'=>$password,
                'email'=>$request->email,
            ]);
        }else{//每填写旧密码
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }

        //添加成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect("admins");
    }

    public function destroy(Admins $admin){
        $admin->delete();
        session()->flash('success','删除成功');
        return redirect("admins");
    }
}
