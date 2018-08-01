@extends('default')
@section('content')
    <h3>--订单列表--</h3>

    <form action="{{route('orders.index')}}" class="navbar-form navbar-left" method="get">
        <div class="form-group">

            <div class="btn-group">

                <select name="shop_id" id="" class="btn btn-default dropdown-toggle" >
                    <option value="">请选择商家...</option>
                    @foreach($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="datetime-local" name="start_time" class="form-control" >-
            <input type="datetime-local" name="end_time" class="form-control">
        </div>
        {{--{{ csrf_field() }}--}}
        <button type="submit" class="btn btn-primary">订单统计</button>
    </form>


    {{--@foreach($menuCategories as $key=>$val)--}}
    {{--<a id="cate_{{$key}}" href="{{ route('menus.index',['id'=>$val->id]) }}"class="btn btn-success">{{$val->name}}</a>--}}
    {{--@endforeach--}}


    <table class="table table-hover">
        <tr class="info">
            <th>订单ID</th>
            <th>订单编号</th>
            {{--<th>详细地址</th>--}}
            {{--<th>收货人电话</th>--}}
            {{--<th>收货人</th>--}}
            {{--<th>订单价格</th>--}}
            <th>订单状态</th>
            <th>下单时间</th>
            <th>所属商家</th>

        </tr>
        @foreach($orders as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->sn}}</td>
                {{--<td>{{$val->province.$val->city.$val->county.$val->address}}</td>--}}

                {{--<td>{{$val->tel}}</td>--}}
                {{--<td>{{$val->name}}</td>--}}
                {{--<td>{{$val->total}}</td>--}}
                <td>
                    @if($val->status==-1)
                        已取消
                    @elseif ($val->status==0)
                        待支付
                    @elseif ($val->status==1)
                        待发货
                    @elseif ($val->status==2)
                        已发货
                    @elseif ($val->status==3)
                        待确认
                    @elseif ($val->status==4)
                        完成
                    @endif
                </td>
                {{--状态(-1:已取消,0:待支付,1:待发货,2:待确认,3:完成)--}}
                <td>{{$val->created_at}}</td>
                <td>{{$val->Shops->shop_name}}</td>


            </tr>
        @endforeach
    </table>
    <div class="container">
        <h3>共计订单数:{{$count}} 条!</h3>
    </div>
    {{$orders->appends($keywords)->links()}}
@stop
