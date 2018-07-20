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
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('admins.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>


                    {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}

                    <span style="float: left">
                   <form action="{{ route('admins.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{--{{ $admins->links() }}--}}
@stop
