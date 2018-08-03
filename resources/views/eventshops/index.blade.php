@extends('default')
@section('content')
    <h3>--报名列表--</h3>

    <table class="table table-hover">
        <tr class="info">
            <th>ID</th>
            <th>活动名称</th>
            <th>报名商家</th>
        </tr>
        @foreach($list as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->events->title}}</td>
                <td>{{$val->shops->shop_name}}</td>

            </tr>
        @endforeach
    </table>
    {{--{{ $events->links() }}--}}
@stop
