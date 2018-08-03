@extends('default')

@section('content')
    <h3>--查看活动--</h3>

    <form action=" " method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动名称:</label>
            <div class="col-sm-9">
                {{ $event->title }}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动开始时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$event->signup_start)}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动结束时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$event->signup_end)}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">开奖时间:</label>
            <div class="col-sm-9">
                {{$event->prize_date}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">开奖状态:</label>
            <div class="col-sm-9">
                {{$event->is_prize==0?'未开奖':'已开奖'}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动详情:</label>
        </div>
        <div class="form-group">
           {!! $event->content !!}
        </div>
    </form>
@stop


