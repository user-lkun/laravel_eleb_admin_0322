@extends('default')

@section('content')
    <h3>--添加权限--</h3>

    <form action="{{ route('rbacs.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-2 control-label">权限名:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="权限名" value="{{ old('name') }}">
            </div>
        </div>
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

@stop