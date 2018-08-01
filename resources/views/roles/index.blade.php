@extends('default')
@section('content')
    <h3>--角色列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>角色ID</th>
            <th>角色名称</th>
            {{--<th>角色权限</th>--}}


            <th>操作</th>
        </tr>
        @foreach($roles as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>

                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('roles.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{route('roles.show',[$val])}}" title="查看" class="btn btn-success">

                        查看权限
                    </a>

                    <span style="float: left">
                <form action="{{ route('roles.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{$roles->links()}}
@stop
