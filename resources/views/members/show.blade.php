@extends('default')

@section('content')
    <h3>--查看会员详情--</h3>
        <table class="table table-hover">
            <tr>
                <td>会员ID</td>
                <td>{{$member->id}}</td>
            </tr>
            <tr>
                <td>名称</td>
                <td>{{$member->username}}</td>
            </tr>
            <tr>
                <td>电话</td>
                <td>{{$member->tel}}</td>
            </tr>
            <tr>
                <td>注册时间</td>
                <td>{{$member->created_at}}</td>
            </tr>
            <tr>
                <td>会员目前状态</td>
                <td>{{$member->status==0?'禁用':'正常'}}</td>
            </tr>
        </table>
    <a href="{{route('members.index') }}" class="btn btn-success">返回</a>
@stop


