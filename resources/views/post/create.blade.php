<html>
<head>
    <title>Thêm mới công việc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div style="margin-right: 20%; margin-left: 20%; padding-top: 20px;">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="create-post" method="POST">
            @csrf
            <div>
                <p>Tiêu đề</p>
                <input class="form-control" name="title" id="title">
            </div>
            <div>
                <p>Nội dung</p>
                <input class="form-control" name="body" id="body">
            </div>
            <div style="padding-top: 20px;">
                <input class="btn btn-success" type="submit" name="submit" value="Thêm mới">
            </div>
        </form>
</div>
</body>
</html>
