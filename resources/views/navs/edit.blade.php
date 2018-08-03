@extends('default')

@section('content')
    <h3>--修改菜单--</h3>

    <form action="{{ route('navs.update',[$nav]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜单名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="菜单名称" value="{{$nav->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">上级菜单:</label>
            <div class="col-sm-9">
                <select name="pid" id="">
                    <option value="0">--请选择上级菜单--</option>
                    @foreach($navs as $val)
                        <option value="{{$val->id}}"
                        {{$val->id==$nav->pid?'selected':''}}
                        >{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">路由地址:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="url" placeholder="路由地址" value="{{ $nav->url}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属权限:</label>
            <div class="col-sm-9">
                <input type="radio" name="permission_id" value="0" {{$nav->permission_id==0?'checked':''}}>无
                @foreach($permissions as $val)

                        <label>
                            <input type="radio" name="permission_id" value="{{$val->id}}"
                            {{$nav->permission_id==$val->id?'checked':''}}
                            >
                            {{$val->name}}
                        </label>

                 @endforeach
            </div>
        </div>
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">确认修改</button>
            </div>
        </div>
    </form>
@stop