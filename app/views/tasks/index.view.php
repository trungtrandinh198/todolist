<?php require "app/views/layouts/header.php" ?>
    <div class="container">
        <form method="post" action="/tasks/delete" class="form-delete-task">
            <input type="hidden" name="id" class="data-id" />
        </form>
        <h3>Submit Task Name</h3>
        <form method="post" action="/tasks/insert" class="text-center row col-sm-8">
            <div class="form-group col-sm-6">
                <input class="form-control" type="text" name="name" placeholder="Task Name...">
            </div>
            <div class="form-group col-sm-6">
                <input class="form-control" type="datetime-local" name="start_date" placeholder="Starting Date...">
            </div>
            <div class="form-group col-sm-6">
                <input class="form-control" type="datetime-local" name="end_date" placeholder="Ending Date...">
            </div>
            <div class="form-group col-sm-6">
                <select name="status" class="form-control">
                    <?php foreach (\app\enums\TaskStatus::getStatusName() as $key => $status) :?>
                        <option value="<?php echo $key ?>"><?php echo $status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="form-group text-center container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Ending Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tasks as $key => $task): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><a href="/tasks/show?id=<?= $task->id ?>"><?= $task->name; ?></a></td>
                        <td><?= $task->start_date ?></td>
                        <td><?= $task->end_date  ?></td>
                        <td><?= \app\enums\TaskStatus::getStatusName()[$task->status]  ?></td>
                        <td>
                            <form action="/tasks/delete" method="POST">
                                <input type="hidden"  name="id" value="<?= $task->id ?>"><br>
                                <button style="margin-top: -40px;" type="submit" class="btn btn-danger">X</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require "app/views/layouts/footer.php" ?>