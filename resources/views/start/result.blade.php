@extends('default')
@section('content')
    <h3>--抽奖完成--</h3>
<div class="container-fluid" style="text-align: center">
    <table class="table table-bordered table-hover" >
        <tr class="info">
            <td>商家名称</td>
            <td>中奖结果</td>
            <td>奖品详情</td>
        </tr>
        @foreach(\App\Models\EventPrizes::where('events_id',$event->id)->get() as $val)

            <tr>
                <td>{{$val->shopusers['name']}}</td>
                <td>{{$val->name}}</td>
                <td>{!! $val->description !!}</td>
            </tr>
        @endforeach
    </table>
</div>




@stop