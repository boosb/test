<form class="form-horizontal" role="form" method="POST"
      action="{{ route('admin.answer.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="modal-body">
        {{--第一行--}}
        <div class="col-md-10">
            <textarea cols="50"  name="ans_cont" required="required"></textarea>
        </div>
    </div>
    <div class="row" style="margin-top: 6px;">
        {{--第二行--}}
        <div class="col-md-1" style="text-align: right;">用户</div>
        <div class="col-md-3">
            <input type="hidden" name="ans_to" id="ans_to" required="required">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>



<form method="POST" action="{{route('admin.answer.store') }}">
    <div class="modal-body">
        <textarea cols="50" rows="10"  name="dis_cont" style="width: 100%;" required="required" placeholder="回复内容"></textarea>
    </div>
    <div class="modal-footer">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="ans_to" id="ans_to" value="">

        <button type="button" class="btn btn-default"
                data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-times-circle"></i> 确认
        </button>
    </div>
</form>