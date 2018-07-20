<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\ShopUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){
        $shop_users = ShopUsers::paginate(3);
        return view('shop_users/index',compact('shop_users'));
    }
    public function create(){
        $shops = Shops::all();

        return view('shop_users/create',compact('shops'));
    }
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:10',
            'password' => 'required|min:6',
//            'repassword' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'email' => 'required|unique:shop_users',
//            'captcha' => 'required|captcha',

        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能小于6位数',
//            'new_password.min'=>'密码不能小于6位数',
//            'repassword.min'=>'密码不能小于6位数',


            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',

//            'captcha.required'=>'验证码不能为空!',
//            'captcha.captcha'=>'验证码错误!',

        ]);
        if ($request->password!=$request->repassword){
            session()->flash('danger','两次输入密码不一样!');
            return redirect(url()->previous());
        }

        //对密码进行加密处理
        $password = bcrypt($request->password);
        ShopUsers::create(['name'=>$request->name,
            'shop_id'=>$request->shop_id,
            'password'=>$password,
            'email'=>$request->email,
            'status'=>$request->status]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("shopusers");
    }
    public function edit(ShopUsers $shopuser){

        $shops = Shops::all();
        return view('shop_users/edit',compact('shopuser','shops'));
    }
    public function update(Request $request,ShopUsers $shopuser){

        $old_email = $request->email;//原邮箱可以不填,就不用更新邮箱
        $this->validate($request, [
            'name' => 'required|max:10',
//            'old_password' => 'required|confirmed',
//            'new_password' => 'confirmed',
//            'repassword' => 'confirmed',
//            'email' => 'required|unique:shop_users,email,'.$old_email.',email',
            'email' => 'required|unique:shop_users,email,'.$old_email.',email',


        ],[
            'name.required'=>'用户名不能为空',
            'name.max'=>'用户名不能超过10个字',
//            'old_password.min'=>'密码不能小于6位数',
//            'new_password.min'=>'密码不能小于6位数',
//            'repassword.min'=>'密码不能小于6位数',
            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',
        ]);
        if ($request->oldpassword!=null){//填写了旧密码
            if (!Hash::check($request->oldpassword,$shopuser->password)){
                session()->flash('danger','旧密码填写错误!');
                return redirect(url()->previous());
            }
            if ($request->password!=$request->repassword){
                session()->flash('danger','确认密码有误!');
                return redirect(url()->previous());
            }
            $password = bcrypt($request->password);
            $shopuser->update([
                'name'=> $request->name,
                'shop_id'=> $request->shop_id,
                'email'=> $request->email,
                'shop_name'=>$request->shop_name,
                'password'=>$password,
                'status'=>$request->status,

            ]);

        }else{
            $shopuser->update([
                'name'=> $request->name,
                'shop_id'=> $request->shop_id,
                'email'=> $request->email,
                'shop_name'=>$request->shop_name,
                'status'=>$request->status,
            ]);
        }
        //修改成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect('shopusers');
    }
    public function destroy(ShopUsers $shopuser){
        $shopuser->delete();
        session()->flash('success','删除成功');
        return redirect("shopusers");
    }


    public function show($id){
        $password = bcrypt("123456");
        $res = DB::update("update shop_users set password = '{$password}' where id = ?", [$id]);
//        dd($res);
        session()->flash('success','重置成功');
        return redirect("shopusers");
    }
}
