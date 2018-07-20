<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>
<body >
<div class="container" style="margin: 0px auto" >
    @include('_errors')
    {{--显示错误信息--}}

    @include('_message')
    <div class="container" style="width: 30%">
        <h3>管理员登录</h3>
        <form action="{{ route('login') }}" method="post" >

            <div class="form-group">
                <label for="adduser">用户名:</label>
                <input type="text" class="form-control" name="name" id="adduser" >
            </div>
            <div class="form-group">
                <label for="addpwd">密码:</label>
                <input type="password" class="form-control" name="password" id="addpwd" >
            </div>


            <div class="form-group">
                <label for="captcha">验证码：</label>

                <input id="captcha" class="form-control" name="captcha" >
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remeberMe">记住我
                </label>
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="登录">
            </div>
        </form>
    </div>


    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="/js/bootstrap.js"></script>
</body>
</html>
