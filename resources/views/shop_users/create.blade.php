@extends('default')

@section('content')
    <h3>--添加商家--</h3>

    <form action="{{ route('shopusers.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="商家名" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属店铺:</label>
            <div class="col-sm-9">
                <select name="shop_id" id="">
                    @foreach($shops as $val)
                        <option value="{{$val->id}}">{{$val->shop_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="password" placeholder="商家密码" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">确认密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="repassword" placeholder="确认密码" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家邮箱:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="email" placeholder="商家邮箱" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">状态:</label>
            <div class="radio">
                <label>显示 &emsp;&emsp;<input type="radio" name="status" id="optionsRadios1" value="1">
                </label>
                <label>隐藏&emsp;&emsp;<input type="radio" name="status" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>

        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop