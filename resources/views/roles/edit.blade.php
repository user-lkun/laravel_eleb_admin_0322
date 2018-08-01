@extends('default')

@section('content')
    <h3>--修改角色--</h3>

    <form action="{{ route('roles.update',[$role]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">角色名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="角色名称" value="{{$role->name }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-4 control-label">给角色赋予权限:</label>
            <div class="col-sm-8">
                @foreach($permissions as $val)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="permission_id[]" id="inlineCheckbox1" value="{{$val->id}}"
                        {{$mypermissions->contains($val)?'checked':''}}
                        >{{$val->name}}
                    </label>
                @endforeach
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