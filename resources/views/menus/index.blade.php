@extends('default')
@section('content')
    <h3>--菜品列表--</h3>

    <form action="{{route('menus.index')}}" class="navbar-form navbar-left" method="get">
        <div class="form-group">

            <div class="btn-group">

                <select name="shop_id" id="" class="btn btn-default dropdown-toggle" >
                    <option value="">请选择商家...</option>
                    @foreach($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="datetime-local" name="start_time" class="form-control" value="{{old('start_time')}}">-
            <input type="datetime-local" name="end_time" class="form-control" value="{{old('end_time')}}">
        </div>
        {{--{{ csrf_field() }}--}}
        <button type="submit" class="btn btn-primary">菜品统计</button>
    </form>
    <table class="table table-hover">
        <tr class="info">
            <th>菜品ID</th>
            <th>菜品名</th>
            {{--<th>详细地址</th>--}}
            {{--<th>收货人电话</th>--}}
            {{--<th>收货人</th>--}}
            <th>菜品价格</th>
            <th>菜品图片</th>
            <th>所属商家</th>
            <th>销售量</th>

        </tr>
        @foreach($menus as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->goods_name}}</td>
                <td>{{$val->goods_price}}</td>
                <td><img src="{{$val->goods_img}}" alt="" width="100px"></td>

                {{--<td>{{$val->Shops['shop_name']}}</td>--}}
                <td>{{$val->Shops->shop_name}}</td>
                <td>{{$val->amount==null?'0':$val->amount}}</td>
            </tr>
        @endforeach
    </table>
    {{--<div class="container">--}}
        {{--<h3>共计订单数:{{$count}} 条!</h3>--}}
    {{--</div>--}}
    {{$menus->appends($keywords)->links()}}

@stop
