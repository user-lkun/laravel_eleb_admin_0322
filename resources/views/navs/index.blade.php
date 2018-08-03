@extends('default')
@section('content')
    <h3>--导航菜单列表--</h3>

    {{--<form action="{{route('orders.index')}}" class="navbar-form navbar-left" method="get">--}}
        {{--<div class="form-group">--}}

            {{--<div class="btn-group">--}}

                {{--<select name="shop_id" id="" class="btn btn-default dropdown-toggle" >--}}
                    {{--<option value="">请选择商家...</option>--}}
                    {{--@foreach($shops as $shop)--}}
                        {{--<option value="{{$shop->id}}">{{$shop->shop_name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<input type="datetime-local" name="start_time" class="form-control" >---}}
            {{--<input type="datetime-local" name="end_time" class="form-control">--}}
        {{--</div>--}}
        {{--{{ csrf_field() }}--}}
        {{--<button type="submit" class="btn btn-primary">订单统计</button>--}}
    {{--</form>--}}


    {{--@foreach($menuCategories as $key=>$val)--}}
    {{--<a id="cate_{{$key}}" href="{{ route('menus.index',['id'=>$val->id]) }}"class="btn btn-success">{{$val->name}}</a>--}}
    {{--@endforeach--}}


    <table class="table table-hover">
        <tr class="info">
            <th>菜单ID</th>
            <th>名称</th>
            <th>路由地址</th>
            <th>上级ID</th>
            <th>权限ID</th>
            <th>操作</th>


        </tr>
        @foreach($navs as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                {{--<td>{{$val->province.$val->city.$val->county.$val->address}}</td>--}}

                <td>{{$val->url}}</td>
                <td>{{$val->pid}}</td>
                <td>{{$val->permission_id}}</td>

                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('navs.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <div style="float: left">
                        <form action="{{ route('navs.destroy',[$val]) }}" method="post" >
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach

    </table>
{{$navs->links()}}
@stop
