@extends('default')
@section('content')
    <h3>--会员列表--</h3>

    <form action="{{route('members.index')}}" class="navbar-form navbar-left" method="get">
        <div class="form-group">

            <input type="text" name="username" class="form-control" value="{{old('username')}}">
        </div>
        {{--{{ csrf_field() }}--}}
        <button type="submit" class="btn btn-primary">搜索会员</button>
    </form>
    <table class="table table-hover">
        <tr class="info">
            <th>会员ID</th>
            <th>会员姓名</th>
            <th>电话</th>
            <th>注册时间</th>
            <th>状态</th>
            <th>操作</th>

        </tr>
        @foreach($members as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->username}}</td>
                <td>{{$val->tel}}</td>
                <td>{{$val->created_at}}</td>
                <td>{{$val->status==1?'正常':'禁用'}}</td>
                <td>
                    <a href="{{route('members.show',[$val])}}" title="查看" class="btn ">

                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    @if($val->status==0)
                        <a href="{{route('members.edit',['id'=>$val->id,'status'=>1])}}" title="启用" class="btn btn-danger">
                            启用
                        </a>
                    @elseif($val->status==1)
                    <a href="{{route('members.edit',['id'=>$val->id,'status'=>0])}}" title="禁用" class="btn btn-danger">
                        禁用
                    </a>
                    @endif


                </td>

            </tr>
        @endforeach
    </table>
    {{--<div class="container">--}}
        {{--<h3>共计订单数:{{$count}} 条!</h3>--}}
    {{--</div>--}}
    {{--{{$orders->appends($keywords)->links()}}--}}
    {{$members->appends($keywords)->links()}}
@stop
