@extends('default')
@section('content')
    <h3>--店铺列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>店铺ID</th>
            <th>店铺所属分类</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            {{--<th>是否是品牌</th>--}}
            {{--<th>是否准时送达</th>--}}
            {{--<th>是否蜂鸟配送</th>--}}
            <th>起送金额</th>
            <th>配送费</th>
            {{--<th>店公告</th>--}}
            {{--<th>优惠信息</th>--}}
            <th>状态:1正常,0待审核,-1禁用</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->shop_categories->name}}</td>
                <td>{{$val->shop_name}}</td>
                <td><img src="{{$val->shop_img}}" alt="" width="100px"></td>
                <td>{{$val->shop_rating}}</td>
                {{--<td>{{$val->brand}}</td>--}}
                {{--<td>{{$val->on_time}}</td>--}}
                {{--<td>{{$val->fengniao}}</td>--}}
                <td>{{$val->start_send}}</td>
                <td>{{$val->send_cost}}</td>
                {{--<td>{{$val->notice}}</td>--}}
                {{--<td>{{$val->discount}}</td>--}}


                {{--<td><img src="{{\Illuminate\Support\Facades\Storage::url($val->img)}}" alt="" width="100px"></td>--}}
                <td>
                @if ($val->status==1)
                    正常
                @elseif($val->status==0)
                    待审核
                @elseif($val->status==-1)
                    禁用
                @endif
                </td>

                <td>
                    &emsp;
                    <a href="{{route('shops.edit',[$val])}}" title="修改" class="btn ">
                    {{--<a href="" title="修改" class="btn ">--}}

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="" title="查看" class="btn ">

                        <span class="glyphicon  glyphicon-zoom-in"></span>
                    </a>

                    <span style="float: left">
                   <form action="{{route('shops.destroy',[$val])}}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{$shops->links()}}
@stop

