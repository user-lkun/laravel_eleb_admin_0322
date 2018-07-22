@extends('default')
@section('content')
    <h3>--平台活动列表--</h3>


    <ul >
        <a href="{{route('activies.index',['status'=>'end'])}}"class="btn btn-danger">已结束活动</a>
        <a href="{{route('activies.index',['status'=>'ing'])}}"class="btn btn-success">进行中的活动</a>
        <a href="{{route('activies.index',['status'=>'not_start'])}}"class="btn btn-primary">未开始的活动</a>

    </ul>
    <table class="table table-hover">
        <tr class="info">
            <th>活动ID</th>
            <th>活动名称</th>
            {{--<th>活动详情</th>--}}
            <th>活动开始时间</th>
            <th>活动结束时间</th>

            <th>操作</th>
        </tr>
        @foreach($activies as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->title}}</td>
                <td>{{ date('Y-m-d　H:i:s',$val->start_time) }}</td>
                <td>{{ date('Y-m-d　H:i:s',$val->end_time) }}</td>
                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('activies.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{route('activies.show',[$val])}}" title="查看" class="btn ">

                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>


                    {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}

                    <span style="float: left">
                   <form action="{{ route('activies.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    {{ $activies->links() }}
@stop
