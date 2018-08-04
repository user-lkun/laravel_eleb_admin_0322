@extends('default')
@section('content')
    <h3>--报名列表--</h3>
    <form action="{{route('eventshops.index')}}" class="navbar-form navbar-left" method="get">
        <div class="form-group">
                <select name="events_id" id="" class="btn btn-default dropdown-toggle" >
                    <option value="">请选择活动</option>
                    @foreach($events as $event)
                        <option value="{{$event->id}}">{{$event->title}}</option>
                    @endforeach
                </select>
        </div>
        {{--{{ csrf_field() }}--}}
        <button type="submit" class="btn btn-primary">搜索活动</button>
    </form>
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
                <td>{{$val->shopusers['name']}}</td>

            </tr>
        @endforeach
    </table>
    {{ $list->appends($wheres)->links() }}
@stop
