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

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/web_uploader/webuploader.css">

    <script type="text/javascript" src="/web_uploader/webuploader.js"></script>
</head>
<body >
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    {{--调方法显示视图--}}
                    {!! \App\Models\Navs::getNavsHtml() !!}
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">导航菜单管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('navs.index')}}">菜单列表</a></li>
                            <li><a href="{{route('navs.create')}}">添加菜单</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>

                    @if(auth()->check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admins.index') }}">个人中心</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">退出</button>
                                </form>
                            </ul>
                        @else
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg btn-link" data-toggle="modal" data-target="#myModal">
                                    登录/注册
                                </button>

                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>


{{--/登录模态框开始--}}

{{--//登录模态框结束--}}




<div class="container-fluid" style="background: #adaeff">
    <div class="container " style="height: 65px">
        <h3>管理后台</h3>
    </div>
</div>
@include('_errors')
{{--显示错误信息--}}

@include('_message')

@include('_left')




</body>
</html>