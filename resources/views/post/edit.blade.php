<html>
<head>
    <title>Thêm mới công việc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div style="margin-right: 20%; margin-left: 20%;">
    <form action="edit-post" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{$post->id}}">
        <div>
            <p>Tiêu đề</p>
            <input class="form-control" name="title" id="title" value="{{$post->title}}">
        </div>
        <div>
            <p>Nội dung</p>
            <input class="form-control" name="body" id="body" value="{{$post->body}}">
        </div>
        <div style="padding-top: 20px;">
            <input class="btn btn-success" type="submit" name="submit" value="Lưu">
        </div>
    </form>
</div>
</body>
</html>
