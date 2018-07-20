@extends('default')

@section('content')
    <h3>--修改店铺信息--</h3>

    <form action="{{ route('shops.update',[$shop]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺所属分类:</label>
            <div class="col-sm-9">
                <select name="shop_category_id" id="">
                    @foreach($shop_categories as $val)
                        <option value="{{$val->id}}"
                        @if($val->id==$shop->shop_category_id)
                            selected
                                @endif
                        >{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="shop_name" placeholder="店铺名称" value="{{ $shop->shop_name }}">
            </div>
        </div>


        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">店铺图片:</label>
            <div class="col-sm-9">
                <input type="file" name="shop_img">
                <img src="{{ $shop->shop_img}}" alt="" width="150px">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺评分:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="shop_rating" placeholder="店铺评分" value="{{ $shop->shop_rating }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否品牌:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="brand" id="optionsRadios1" value="1" {{$shop->brand==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="brand" id="optionsRadios2" value="0"{{$shop->brand==0?'checked':''}} >
                </label>
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准时送达:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="on_time" id="optionsRadios1" value="1"{{$shop->on_time==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="on_time" id="optionsRadios2" value="0" {{$shop->on_time==0?'checked':''}}>
                </label>
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否蜂鸟配送:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="fengniao" id="optionsRadios1" value="1" {{$shop->fengniao==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="fengniao" id="optionsRadios2" value="0" {{$shop->fengniao==0?'checked':''}}>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否保标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="bao" id="optionsRadios1" value="1"{{$shop->bao==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="bao" id="optionsRadios2" value="0" {{$shop->bao==0?'checked':''}}>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否票标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="piao" id="optionsRadios1" value="1"{{$shop->piao==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="piao" id="optionsRadios2" value="0" {{$shop->piao==0?'checked':''}}>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="zhun" id="optionsRadios1" value="1"{{$shop->zhun==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="zhun" id="optionsRadios2" value="0" {{$shop->zhun==0?'checked':''}}>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">起送金额:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="start_send" placeholder="起送金额" value="{{ $shop->start_send }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">配送费:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="send_cost" placeholder="配送费" value="{{ $shop->send_cost }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店公告:</label>
            <div class="col-sm-9">
                <textarea name="notice" id="" cols="30" rows="5" >{{$shop->notice}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">优惠信息:</label>
            <div class="col-sm-9">
                <textarea name="discount" id="" cols="30" rows="5" >{{$shop->discount}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">状态:</label>
            <div class="radio">
                <label>通过审核 &emsp;&emsp;<input type="radio" name="status" id="optionsRadios1" value="1" {{$shop->status==1?'checked':''}}>
                </label>
                <label>待审核&emsp;&emsp;<input type="radio" name="status" id="optionsRadios2" value="0" {{$shop->status==0?'checked':''}}>
                </label>
                <label>禁用&emsp;&emsp;<input type="radio" name="status" id="optionsRadios2" value="-1" {{$shop->status==-1?'checked':''}}>
                </label>
            </div>
        </div>

        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop