<div class="row">
  <div class="col-md-8">
    <div class="form-group">
      <label for="title" class="col-md-2 control-label">
        标题
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="title" autofocus
               id="title" value="{{ $title }}">
      </div>
    </div>
    <div class="form-group">
      <label for="subtitle" class="col-md-2 control-label">
        副标题
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="slug"
               id="subtitle" value="{{ $slug }}">
      </div>
    </div>

    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        内容
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="content" rows="14"
                  id="content">{{ $content }}</textarea>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="publish_date" class="col-md-3 control-label">
        发布日期
      </label>

      <div class="col-md-8">
        <input disabled="false" class="form-control" name="publish_date" id="publish_date"
               type="text" value="{{ $publish_date }}">
      </div>
    </div>
    <div class="form-group">
      <label for="publish_time" class="col-md-3 control-label">
        发布时间
      </label>
      <div class="col-md-8">
        <input disabled="false" class="form-control" name="publish_time" id="publish_time"
               type="text" value="{{ $publish_time }}">
      </div>
    </div>





  </div>
</div>
