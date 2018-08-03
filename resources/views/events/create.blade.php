@extends('default')

@section('content')
    <h3>--添加抽奖活动--</h3>

    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="title" placeholder="名称" value="{{ old('title') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动开始时间:</label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" id="inputCategroy" name="signup_start" placeholder="活动开始时间" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动结束时间:</label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" id="inputCategroy" name="signup_end" placeholder="活动结束时间" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">开奖日期:</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="inputCategroy" name="prize_date" placeholder="开奖日期" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">报名人数上限:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="signup_num" placeholder="人数" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动详情:</label>

        </div>
        <div class="form-group">
        @include('vendor.ueditor.assets')
        <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                });
            </script>

            <!-- 编辑器容器 -->
            <script id="container" name="content" type="text/plain">活动内容</script>
        </div>
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop


