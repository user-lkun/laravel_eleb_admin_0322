@extends('default')
@section('content')
    <h3>--权限列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>权限ID</th>
            <th>权限名称</th>


            <th>操作</th>
        </tr>
        @foreach($permissions as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>

                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('rbacs.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>


                    <span style="float: left">
                   <form action="{{ route('rbacs.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{$permissions->links()}}
@stop
