@extends('default')

@section('content')
    <h3>--修改分类--</h3>

    <form action="{{ route('shop_categories.update',[$shop_category]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-2 control-label">分类名:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="分类名" value="{{ $shop_category->name }}">
            </div>
        </div>
        <div class="form-group" >
            <label for="inputTitle" class="col-sm-2 control-label">分类图片:</label>
            <div class="col-sm-10">
                <input type="file" name="img">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($shop_category->img) }}" alt="" width="100px">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-2 control-label">状态:</label>
            <div class="radio">
                <label>显示 &emsp;&emsp;<input type="radio" name="status" id="optionsRadios1" value="1" {{ $shop_category->status==1?'checked':'' }}>
                </label>
                <label>隐藏&emsp;&emsp;<input type="radio" name="status" id="optionsRadios2" value="0" {{ $shop_category->status==0?'checked':'' }}>
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