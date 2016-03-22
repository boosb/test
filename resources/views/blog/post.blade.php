<html>
    <head>
        <title>{{ $post->title }}</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>{{ $post->title }}</h1>
            <h5>{{ $post->published_at }}</h5>
            <hr>
                {!! nl2br(e($post->content)) !!}


                {{--评论区--}}
                <hr>


                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('blog.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="row">
                            {{--第一行--}}
                            <div class="col-md-1" style="text-align: right;">内容</div>
                            <div class="col-md-10">
                                <textarea cols="50"  name="dis_cont" required="required"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 6px;">
                            {{--第二行--}}
                            <div class="col-md-1" style="text-align: right;">用户</div>
                            <div class="col-md-3">
                                <input type="text" name="userName" required="required">
                            </div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>



                    </form>
                <hr>
           @if($discuss==null)
               <i style="font-size: 12px;color: #9d9d9d;">还没有任何评论</i>
               <hr>
           @else
                @foreach ($discuss as $discuss)

                    <li style="list-style-type: none">
                        用户：<i style="color: dodgerblue;">{{$discuss->userName}}</i>
                        说：

                        {{$discuss->dis_cont}}

                        <em style="font-size: 10px;color: #9d9d9d;">({{ $discuss->dis_date }})</em>

                        <hr>
                    </li>

                    @endforeach
           @endif
            <!--高速版-->
            {{--<div id="SOHUCS"></div>
            <script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
            <script type="text/javascript">
                window.changyan.api.config({
                    appid: 'cysioqrFm',
                    conf: 'prod_19ba502d63c83009e7ba9b070b2bf571'
                });
            </script>--}}
            <button class="btn btn-primary" onclick="history.go(-1)">
                « 返回
            </button>
        </div>
    </body>
</html>