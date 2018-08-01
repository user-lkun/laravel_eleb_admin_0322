@extends('default')

@section('content')
    <h3>--添加角色--</h3>

    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 80%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-4 control-label">角色名:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="角色名" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-4 control-label">给角色赋予权限:</label>
            <div class="col-sm-8">
                @foreach($permissions as $val)
                <label class="checkbox-inline">
                    <input type="checkbox" name="permission_id[]" id="inlineCheckbox1" value="{{$val->id}}">{{$val->name}}
                </label>
               @endforeach
            </div>
        </div>
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <label for="inputCategroy" class="col-sm-1 control-label"></label>
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

@stop