<?php

namespace App\Http\Controllers;

use App\Models\Shop_categories;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){
        $shops = Shops::paginate(3);
        return view('shops/index',compact('shops'));
    }
    public function create(){
        $shop_categories = Shop_categories::all();
        return view('shops/create',compact('shop_categories'));
    }
    public function store(Request $request){
        //数据验证

        $this->validate($request, [
            'shop_category_id' => 'required',
            'shop_name' => 'required',
            'shop_img' => 'required',
            'shop_rating' => 'required|numeric',


            'start_send' => 'required|numeric',
            'send_cost' => 'required|numeric',
            'notice' => 'required|max:255',
            'discount' => 'required|max:255',

        ],[
            'shop_category_id.required'=>'店铺分类不能为空',
            'shop_name.required'=>'店铺名称不能为空',
            'shop_img.required'=>'请上传店铺图像',
            'shop_rating.required'=>'店铺评分不能为空',

            'shop_rating.numeric'=>'店铺评分必须为数字',

            'start_send.required'=>'起送金额不能为空',
            'start_send.numeric'=>'起送金额必须为数字',
            'send_cost.required'=>'配送费不能为空',
            'send_cost.numeric'=>'配送费必须为数字',
            'notice.required'=>'店公告不能为空',
            'notice.max'=>'店公告不能超过255个字',
            'discount.required'=>'优惠信息不能为空',
            'discount.max'=>'优惠信息不能超过255个字',

        ]);
        //处理图片
        //$shop_img = $request->shop_img;
        //$shop_img_name = $shop_img->store('public/shop_img');
        //$img  = Storage::url($shop_img_name);
        //$true_path = url($img);
        Shops::create(['shop_category_id'=> $request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_img'=>$request->shop_img,
            'shop_rating'=>$request->shop_rating,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
            'status'=>$request->status,
            ]);


        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("shops");
    }
    public function edit(Shops $shop){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $shop_categories = Shop_categories::all();
         return view('shops/edit',compact('shop','shop_categories'));
    }

    public function update(Shops $shop,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        $this->validate($request, [
            'shop_category_id' => 'required',
            'shop_name' => 'required',
//            'shop_img' => 'required',
            'shop_rating' => 'required|numeric',


            'start_send' => 'required|numeric',
            'send_cost' => 'required|numeric',
            'notice' => 'required|max:255',
            'discount' => 'required|max:255',

        ],[
            'shop_category_id.required'=>'店铺分类不能为空',
            'shop_name.required'=>'店铺名称不能为空',
//            'shop_img.required'=>'请上传店铺图像',
            'shop_rating.required'=>'店铺评分不能为空',

            'shop_rating.numeric'=>'店铺评分必须为数字',

            'start_send.required'=>'起送金额不能为空',
            'start_send.numeric'=>'起送金额必须为数字',
            'send_cost.required'=>'配送费不能为空',
            'send_cost.numeric'=>'配送费必须为数字',
            'notice.required'=>'店公告不能为空',
            'notice.max'=>'店公告不能超过255个字',
            'discount.required'=>'优惠信息不能为空',
            'discount.max'=>'优惠信息不能超过255个字',

        ]);
        //处理图片
        $shop_img = $request->shop_img;
        if($shop_img==null){//没上传图片,就不修改图片
            $shop->update([
                'shop_category_id'=> $request->shop_category_id,
                'shop_name'=>$request->shop_name,
//                'shop_img'=>$shop_img_name,
                'shop_rating'=>$request->shop_rating,
                'brand'=>$request->brand,
                'on_time'=>$request->on_time,
                'fengniao'=>$request->fengniao,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'status'=>$request->status,
            ]);
            //修改成功,设置提示信息
            session()->flash('success','修改成功');
            return redirect('shops');
        }else{
            //$shop_img_name = $shop_img->store('public/shop_img');
            //img  = Storage::url($shop_img_name);
            //$true_path = url($img);
            //修改成功后保存
            $shop->update([
                'shop_category_id'=> $request->shop_category_id,
                'shop_name'=>$request->shop_name,
                'shop_img'=>$shop_img,
                'shop_rating'=>$request->shop_rating,
                'brand'=>$request->brand,
                'on_time'=>$request->on_time,
                'fengniao'=>$request->fengniao,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'status'=>$request->status,
            ]);
            //修改成功,设置提示信息
            session()->flash('success','修改成功');
            return redirect('shops');
        }

    }
    public function destroy(Shops $shop){
        if (!Auth::user()->can('删除')){
            return view('public');
        }
        $id = $shop->id;
        $res = DB::table('shop_users')->where('shop_id',$id)->count();//判断商户下面是否还存在商家
//        $res = DB::select("select COUNT(*) from shop_users WHERE shop_id=?",[$id]);
        if ($res==0){
            $shop->delete();
            session()->flash('success','删除成功');
            return redirect("shops");
        }else{
            session()->flash('danger','该商户下面还存在商家,不能被删除!');
            return redirect("shops");
        }
    }

}
