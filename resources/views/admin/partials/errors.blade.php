@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>噢!</strong>
        输入有误：<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif