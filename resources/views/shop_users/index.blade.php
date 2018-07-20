@extends('default')
@section('content')
    <h3>--商家列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>商家列表ID</th>
            <th>商家名称</th>
            <th>所属店铺</th>
            <th>商家邮箱</th>
            <th>状态</th>


            <th>操作</th>
        </tr>
        @foreach($shop_users as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->shops->shop_name}}</td>

                <td>{{ $val->email }}</td>
                <td>{{$val->status==1?'显示':'隐藏'}}</td>

                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('shopusers.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{route('shopusers.reset',[$val])}}" class="btn ">

                        <span class="btn btn-link">重置密码</span>
                    </a>

                    <span style="float: left">
                   <form action="{{ route('shopusers.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{ $shop_users->links() }}
@stop
