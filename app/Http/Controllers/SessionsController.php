<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function login(){
        if (Auth::check()){//判断是否已经登录
           return redirect('admins');
        }
        return view('login/login');
    }
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证码错误',
        ]);
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password],[$request->remeberMe])) {

            return redirect('admins')->with('success','登陆成功');
        }else{
            return redirect()->back()->with('danger','用户名或密码错误')->withInput();
        }

    }
    public function destroy(){
        Auth::logout();
        return redirect('/')->with('success','退出成功');

    }
}
