@extends('admin.layout')


    @section('styles')
        <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
        <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
        <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
        <link href="/assets/selectize/css/selectize.css" rel="stylesheet">
        <link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
    @stop
@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <h5>{{ $post->published_at }}</h5>

    {{--评论区--}}
    <hr>


    评论详情：
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
            @foreach($discuss->answer as $answer)
                <li style="list-style-type: none">
                    &nbsp;&nbsp;&nbsp;<i style="color: dodgerblue;">作者回复：</i>{{$answer->ans_cont}}<em style="font-size: 10px;color: #9d9d9d;">({{ $answer->ans_date }})</em>
                </li>
                @endforeach
            </li>
            <li style="list-style-type: none">
                <br>

                <a style="font-size: 10px;" type="button" onclick="setDelRul({{$discuss->dis_id}})" class="btn btn-danger"
                   data-toggle="modal" data-target="#modal-delete">
                    <i class="glyphicon glyphicon-trash" ></i>
                    删除
                </a>
                <a style="font-size: 10px;" type="button" onclick="setDisId({{$discuss->dis_id}})"  class="btn btn-primary"
                   data-toggle="modal" data-target="#modal-answer">
                    <i class="glyphicon glyphicon-upload" ></i>
                    回复
                </a>
            </li>

            <hr>
        @endforeach
    @endif
    <button class="btn btn-primary" onclick="history.go(-1)">
        « 返回
    </button>
</div>

{{-- Confirm Delete --}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">请确认</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i> &nbsp;
                    确认删除这条评论？
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" name="delete" action="">

                    {{ csrf_field() }}
                    {{ method_field('delete') }}

                    <input type="hidden" name="dis_id" id="dis_id" value="111" >
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> 确认
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-answer" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">请输入回复内容：</h4>
            </div>
            <form class="form-horizontal" name="delete" role="form" method="POST"
                  action="{{ route('admin.answer.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">
                    {{--第一行--}}

                        <textarea cols="50" rows="8" style="width: 100%;"  name="ans_cont" required="required" placeholder="回复内容"></textarea>

                </div>
                        <input type="hidden" name="discusses_id" id="discusses_id" required="required">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> 确认
                        </button>
                    </div>

            </form>
        </div>
    </div>
</div>

</div>
@stop
@section('scripts')
    <script src="/assets/pickadate/picker.js"></script>
    <script src="/assets/pickadate/picker.date.js"></script>
    <script src="/assets/pickadate/picker.time.js"></script>
    <script src="/assets/selectize/selectize.min.js"></script>
    <script>
        //传值到回复框中
        function setDisId(value){
//            document.getElementById("ans_to").value = dis_id;
            $("input[name=discusses_id]").val(value);
        }
        function setDelRul(id){
            /*var uri = "@{{ route('create', "+dis+") }}";
            $('form').attr("action", uri);*/

            $("form[name=delete]").attr("action","/admin/discuss/"+id);
        }
    </script>
@stop