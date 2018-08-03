<?php

namespace App\Http\Controllers;

use App\Models\Shop_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Shop_categoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){
        $shop_categories = Shop_categories::all();
        return view('shop_categories/index',compact('shop_categories'));
    }
    public function create(){//添加页面
        return view('shop_categories/create');
    }
    public function store(Request $request){//添加保存
        //验证添加数据
        $this->validate($request,[
            'name'=>'required|max:10',

            'img'=>'required',

        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过10个字',
            'img.required'=>'分类图片不能为空',
        ]);
        $name = $request->name;
        $status = $request->status;
        $img = $request->img;
        //保存文件
       // $img_name = $img->store('public/img');
        Shop_categories::create(['name'=>$name,'img'=>$img,'status'=>$status]);
        session()->flash('success','添加成功');
        return redirect('shop_categories');
    }
    public function edit(Shop_categories $shop_category){//回显
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        return view('shop_categories/edit',compact('shop_category'));
    }

    public function update(Shop_categories $shop_category,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $this->validate($request,[
            'name'=>'required|max:10',

        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过10个字',

        ]);
        //修改成功后保存
        $file = $request->img;

        if ($file==null){//没上传分类图片
            $shop_category->update([
                'name'=>$request->name,
                'status'=>$request->status,

            ]);
        }else{//上传了分类图片
            //保存文件
            //$head_name = $file->store('public/logo');
            $shop_category->update([
                'name'=>$request->name,
                'status'=>$request->status,
                'img'=>$request->img,
            ]);
        }

        session()->flash('success','修改成功');
        return redirect('shop_categories');
    }
    //删除
    public function destroy(Shop_categories $shop_category){
        if (!Auth::user()->can('删除')){
            return view('public');
        }
        $id = $shop_category->id;
        $res = DB::table('shops')->where('shop_category_id',$id)->count();
//        $res = DB::select("select title from articles WHERE cate_id='{$id}'");
//        dd($res);
        if ($res==0){//判断商户分类中是否存在商户,不存在就删除
            $shop_category->delete();
            session()->flash('success','删除成功');
            return redirect("shop_categories");
        }else{
            session()->flash('warning','该分类下面存在商户,不能被删除!');
            return redirect("shop_categories");
        }
    }



}
