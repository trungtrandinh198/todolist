<html>
<head>
    <title>Quản lý công việc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div style="margin-right: 20%; margin-left: 20%;">
    <div>
        <a class="btn btn-success" href="post/create">Thêm mới</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post -> body}}</td>
                    <td>
                        <a class="btn btn-info" href="post/{{$post->id}}/edit">Chỉnh sửa</a>
                        <a class="btn btn-danger" href="post/{{$post->id}}/delete">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
