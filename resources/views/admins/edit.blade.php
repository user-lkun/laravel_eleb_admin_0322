@extends('default')

@section('content')
    <h3>--修改管理员--</h3>

    <form action="{{ route('admins.update',[$admin]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="名称" value="{{$admin->name }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">旧密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="oldpassword" placeholder="旧密码" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">新密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="newpassword" placeholder="新密码" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">确认密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="repassword" placeholder="确认密码" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">管理员邮箱:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="email" placeholder="管理员邮箱" value="{{$admin->email }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">给管理员添加角色:</label>
            <div class="col-sm-9">
                @foreach($roles as $val)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="role_ids[]" id="inlineCheckbox1" value="{{$val->id}}"
                                {{$myroles->contains($val)?'checked':''}}
                        >{{$val->name}}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">验证码:</label>
            <label for="inputPassword3" class="col-sm-2 control-label">
                <input id="captcha" class="form-control" name="captcha" >
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">


            </label>
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