<ul class="nav navbar-nav">
    <li><a href="/">博客首页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/post*')) class="active" @endif>
            <a href="/admin/post">文章</a>
        </li>
        <li @if (Request::is('admin/discuss*')) class="active" @endif>
            <a href="/admin/discuss">评论</a>
        </li>
        {{--<li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="/admin/tag">标签</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="active" @endif>
            <a href="/admin/upload">上传</a>
        </li>--}}
    @endif
</ul>
<!-- 判断用户是否登录从而显示不同的内容 -->
<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/login"><i class="glyphicon glyphicon-user" style="font-size: 12px"></i>登录</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                    aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" style="text-align: center;">
                <li><a href="/logout"><i class="glyphicon glyphicon-log-out" style="font-size: 12px;"></i>  退出</a></li>
            </ul>
        </li>
    @endif
</ul>