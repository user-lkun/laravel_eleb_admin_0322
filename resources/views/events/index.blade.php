@extends('default')
@section('content')
    <h3>--抽奖活动列表--</h3>


    {{--<ul >--}}
        {{--<a href="{{route('activies.index',['status'=>'end'])}}"class="btn btn-danger">已结束活动</a>--}}
        {{--<a href="{{route('activies.index',['status'=>'ing'])}}"class="btn btn-success">进行中的活动</a>--}}
        {{--<a href="{{route('activies.index',['status'=>'not_start'])}}"class="btn btn-primary">未开始的活动</a>--}}

    {{--</ul>--}}
    <table class="table table-hover">
        <tr class="info">
            <th>活动ID</th>
            <th>活动名称</th>

            {{--<th>活动详情</th>--}}
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            {{--<th>报名人数限制</th>--}}
            <th>开奖时间</th>
            <th>开奖状态</th>

            <th>操作</th>
        </tr>
        @foreach($events as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->title}}</td>
                {{--<td>{{$val->content}}</td>--}}
                <td>{{ date('Y-m-d　H:i:s',$val->signup_start) }}</td>
                <td>{{ date('Y-m-d　H:i:s',$val->signup_end) }}</td>
                {{--<td>{{ $val->signup_num}}</td>--}}
                <td>{{ $val->prize_date }}</td>
                <td>{{ $val->is_prize==0?'未开奖':'已开奖'}}</td>
                <td>

                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('events.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{route('events.show',[$val])}}" title="查看" class="btn ">

                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>


                    {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}

                    <span style="float: left">

                   <form action="{{ route('events.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>

                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{--{{ $events->links() }}--}}
@stop
