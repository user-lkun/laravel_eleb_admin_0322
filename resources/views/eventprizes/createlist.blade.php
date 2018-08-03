@extends('default')
@section('content')
    <h3>--奖品列表--</h3>

    <table class="table table-hover">
        <tr class="info">
            <th>ID</th>
            <th>活动名称</th>
            <th>操作</th>
        </tr>
        @foreach($events as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->title}}</td>
                <td>

                    <a href="{{route('eventprizes.create',['id'=>$val->id])}}"  title="添加奖品" class="btn btn-primary">
                        添加奖品
                    </a>

                </td>
            </tr>

        @endforeach
    </table>
    {{--{{ $events->links() }}--}}
@stop
