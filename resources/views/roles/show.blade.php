@extends('default')

@section('content')
    <h3>--查看角色--</h3>

    <table class="table table-hover">
        <tr>
            <td class="col-sm-1">角色名:</td>
            <td class="col-sm-11">{{$role->name}}</td>
        </tr>
        <tr>
            <td>拥有权限:</td>
            <td>
                @foreach($mypermissions as $val)
                {{$val->name}}&emsp;&emsp;&emsp;
                @endforeach
             </td>
        </tr>

    </table>
    <a href="{{route('roles.index') }}" class="btn btn-success">返回</a>
@stop