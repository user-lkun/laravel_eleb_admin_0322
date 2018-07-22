@extends('default')
@section('content')
    <h3>--商家分类表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>商家分类ID</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>分类状态</th>
            <th>创建时间</th>

            <th>操作</th>
        </tr>
        @foreach($shop_categories as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td><img src="{{$val->img}}" alt="" width="100px"></td>
                <td>{{$val->status==1?'显示':'隐藏'}}</td>
                <td>{{$val->created_at}}</td>
                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('shop_categories.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{--<a href="" title="添加" class="btn ">--}}

                        {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}

                    <span style="float: left">
                   <form action="{{ route('shop_categories.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
@stop
