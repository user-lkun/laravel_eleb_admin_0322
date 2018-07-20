@extends('default')

@section('content')
    <h3>--添加分类--</h3>

    <form action="{{ route('shop_categories.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-2 control-label">分类名:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="分类名" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group" >
            <label for="inputTitle" class="col-sm-2 control-label">分类图片:</label>
            <div class="col-sm-10">
                <input type="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-2 control-label">状态:</label>
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