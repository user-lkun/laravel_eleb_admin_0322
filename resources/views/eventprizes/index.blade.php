@extends('default')
@section('content')
    <h3>--奖品列表--</h3>

    <table class="table table-hover">
        <tr class="info">
            <th>ID</th>
            <th>活动名称</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商家</th>
            <th>操作</th>
        </tr>
        @foreach($eventprizes as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->events['title']}}</td>
                <td>{{$val->name}}</td>
                <td>{!! $val->description !!}</td>
                <td>{{$val->shop_id==0?'未知':$val->shopusers['name']}}</td>
                <td>

                    <a href="{{route('eventprizes.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>


                    <span style="float: left">

                   <form action="{{ route('eventprizes.destroy',[$val]) }}" method="post" >
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
