<div class="container" style="padding: 20px 10px ;background-color: rgba(90,47,180,0.29)">
    <div class="bs-example col-lg-2" data-example-id="vertical-button-group" style="">
        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    管理员帐号管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{ route('admins.index') }}">管理员列表</a></li>
                    <li><a href="{{ route('admins.create') }}">添加管理员</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    商家分类管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                    <li><a href="{{ route('shop_categories.index') }}">分类列表</a></li>
                    <li><a href="{{ route('shop_categories.create') }}">添加分类</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>

                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    店铺管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                    <li><a href="{{ route('shops.index') }}">店铺列表</a></li>
                    <li><a href="{{ route('shops.create') }}">添加店铺</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>

                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    商家账号管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{ route('shopusers.index') }}">商家列表</a></li>
                    <li><a href="{{ route('shopusers.create') }}">添加商家</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    活动管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">

                    <li><a href="{{ route('activies.index') }}">活动列表</a></li>
                    <li><a href="{{route('activies.create')}}">添加活动</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    订单管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('orders.index')}}">订单统计</a></li>
                    {{--<li><a href="#">Dropdown link</a></li>--}}
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    菜品管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('menus.index')}}">菜品统计</a></li>
                    {{--<li><a href="#">Dropdown link</a></li>--}}
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    会员管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('members.index')}}">会员列表</a></li>
                    {{--<li><a href="#">Dropdown link</a></li>--}}
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    权限管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('rbacs.index')}}">权限列表</a></li>
                    <li><a href="{{route('rbacs.create')}}">添加权限</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    角色管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('roles.index')}}">角色列表</a></li>
                    <li><a href="{{route('roles.create')}}">添加角色</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ------管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="#">Dropdown link</a></li>
                    <li><a href="#">Dropdown link</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-default">单个</button>

        </div>
    </div>


    <div class="col-lg-10">
        @yield('content')
    </div>
</div>