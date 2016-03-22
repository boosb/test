@extends('admin.layout')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>文章 <small>&raquo; 列表</small>
                    <i style="color: #2e6da4;" class="btn " onclick="history.go(-1)">
                        « 返回
                    </i>
                </h3>
                <h5>   &nbsp;&nbsp;&nbsp;第 <i style="color: dodgerblue;">{{ $posts->currentPage() }}</i> 页  共 <i style="color: dodgerblue;">{{ $posts->lastPage() }}</i> 页</h5>

            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/post/create" class="btn btn-success btn-md">
                    <i class="glyphicon glyphicon-pencil" style="font-size: 11px"> </i>&nbsp;&nbsp;新文章
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors'){{-- 错误信息 --}}
                @include('admin.partials.success'){{-- 成功信息 --}}

                <table style="text-align: center;" id="posts-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center;">时间</th>
                        <th style="text-align: center;">标题</th>
                        <th style="text-align: center;">副标题</th>
                        <th style="text-align: center;" data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td data-order="{{ $post->published_at->timestamp }}">
                                {{ $post->published_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td><a style=" text-decoration-line: none;" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <a href="/admin/post/{{ $post->id }}/edit"
                                   class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-edit"></i> 编辑
                                </a>
                                <a href="/blog/{{ $post->slug }}"
                                   class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-eye-open"></i> 浏览
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div style="float:right;">{!! $posts->render() !!}</div>

    </div>

@stop

@section('scripts')
    <script>
        $(function() {
            $("#posts-table").DataTable({
                order: [[0, "desc"]]
            });
        });
    </script>
@stop