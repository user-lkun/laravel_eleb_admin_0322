@extends('default')
@section('content')
    <h3>--管理员列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>管理员ID</th>
            <th>名称</th>
            <th>邮箱</th>

            <th>操作</th>
        </tr>
        @foreach($admins as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{ $val->email }}</td>
                <td>
                    &emsp;&emsp;
                    <a href="{{route('admins.show',[$val])}}" title="查看" class="btn btn-success">

                        所属角色
                    </a>
                    &emsp;@can('修改管理员')
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('admins.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                        @endcan
                    {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}
                    @can('删除管理员')
                    <span style="float: left">
                   <form action="{{ route('admins.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{ $admins->links() }}--}}
@stop
