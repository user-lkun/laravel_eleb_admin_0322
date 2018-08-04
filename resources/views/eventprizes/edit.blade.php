@extends('default')

@section('content')
    <h3>--修改活动奖品--</h3>

    <form action="{{ route('eventprizes.update',[$eventprize]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动名称:</label>
            <div  class="col-sm-9 ">
                <select name="events_id" id="">
                    @foreach($events as $val)
                        <option value="{{$val->id}}" {{$eventprize->events_id==$val->id?'selected':''}}>{{$val->title}}</option>
                    @endforeach
                </select>
            </div>


        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">奖品名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="奖品名称" value="{{$eventprize->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">奖品详情:</label>
            <div class=" col-sm-9 control-label" >
            @include('vendor.ueditor.assets')
            <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>

                <!-- 编辑器容器 -->
                <script id="container" name="description" type="text/plain">{!! $eventprize->description !!}</script>
            </div>
        </div>
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交修改</button>
            </div>
        </div>
    </form>
@stop


