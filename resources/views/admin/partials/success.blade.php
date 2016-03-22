@if (Session::has('success'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> 完成. &nbsp;
    </strong>
    {{ Session::get('success') }}
  </div>
@endif