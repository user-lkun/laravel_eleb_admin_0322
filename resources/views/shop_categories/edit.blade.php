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
            {{--隐藏图片地址--}}
            <input type="hidden" id="img_url" name="img" >
            <div class="col-sm-10">
                <!--dom结构部分-->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
                <img id="shop_cate_img" src="{{$shop_category->img}}" alt="" width="100px">
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


    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            //swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server:"{{route('upload')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/gif,image/jpg,image/jpeg,image/bmp,image/png'
            },
            formData:{
                _token:'{{csrf_token()}}'
            },
        })
        uploader.on('uploadSuccess',function (file,response) {
            console.log(response)
            $('#shop_cate_img').attr('src',response.fileName)
            $('#img_url').val(response.fileName)
        })
    </script>
@stop