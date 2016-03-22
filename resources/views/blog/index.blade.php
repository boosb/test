<html>
    <head>
        <title>{{ config('blog.title') }}</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>{{ config('blog.title') }}</h1>
            <h5>第 <i style="color: dodgerblue;">{{ $posts->currentPage() }}</i> 页  共 <i style="color: dodgerblue;">{{ $posts->lastPage() }}</i> 页</h5>
            <hr>
            <ul>
            @foreach ($posts as $post)

                <li style="list-style-type: none">
                    <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                    <em style="font-size: 10;color: #9d9d9d;">(发布时间：{{ $post->published_at }})</em>
                    <p>
                        {{ str_limit($post->content) }}
                    </p>
                </li>
            @endforeach
            </ul>
            <hr>
            {!! $posts->render() !!}
        </div>
    </body>
</html>