@extends('default')
@section('content')
    <h3>--修改商家--</h3>

    <form action="{{ route('shopusers.update',[$shopuser]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="商家名" value="{{$shopuser->name }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属店铺:</label>
            <div class="col-sm-9">
                <select name="shop_id" id="">
                    @foreach($shops as $val)
                        <option value="{{$val->id}}"
                        @if($val->id==$shopuser->shop_id)
                            selected
                                @endif
                        >{{$val->shop_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">旧密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="oldpassword" placeholder="旧密码" >
            </div>
            <label for="inputCategroy" class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
               <p style="color: red">如果不填写旧密码,就不用修改密码!</p>
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
            <label for="inputCategroy" class="col-sm-3 control-label">商家邮箱:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="email" placeholder="商家邮箱" value="{{ $shopuser->email }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">状态:</label>
            <div class="radio">
                <label>显示 &emsp;&emsp;<input type="radio" name="status" id="optionsRadios1" value="1" {{ $shopuser->status==1?'checked':'' }}>
                </label>
                <label>隐藏&emsp;&emsp;<input type="radio" name="status" id="optionsRadios2" value="0" {{ $shopuser->status==0?'checked':'' }}>
                </label>
            </div>
        </div>

        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop