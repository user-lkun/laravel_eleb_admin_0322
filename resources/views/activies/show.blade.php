@extends('default')

@section('content')
    <h3>--查看活动--</h3>

    <form action=" " method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动名称:</label>
            <div class="col-sm-9">
                {{ $activy->title }}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动开始时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$activy->start_time)}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动结束时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$activy->end_time)}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动详情:</label>

        </div>
        <div class="form-group">
           {!! $activy->content !!}
        </div>
    </form>
@stop


