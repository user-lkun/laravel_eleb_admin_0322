@extends('default')

@section('content')
    <h3>--修改权限--</h3>

    <form action="{{ route('rbacs.update',[$rbac]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="名称" value="{{$rbac->name }}">
            </div>
        </div>
        {{csrf_field()}}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop