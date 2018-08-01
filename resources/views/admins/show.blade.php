@extends('default')

@section('content')
    <h3>--查看拥有的角色--</h3>

    <table class="table table-hover">
        <tr>
            <td class="col-sm-1">管理员:</td>
            <td class="col-sm-11">{{$admin->name}}</td>
        </tr>

        <tr>
            <td>拥有角色:</td>
            <td>
                @foreach($myroles as $val)
                {{$val->name}}&emsp;&emsp;&emsp;
                @endforeach
             </td>
        </tr>

    </table>
    <a href="{{route('admins.index') }}" class="btn btn-success">返回</a>
@stop