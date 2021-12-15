<?php require "app/views/layouts/header.php" ?>
<div class="container">
    <h2>Task: <?= $task->name ?></h2>
    <form method="POST" action="/tasks/edit" class="form-group row text-center col-sm-8">
        <input type="hidden" name="id" value="<?php echo $task->id ?>">
        <div class="form-group col-sm-12">
            <input class="form-control" type="text" name="name" value="<?php echo $task->name ?>" placeholder="Task Name...">
        </div>
        <div class="form-group col-sm-12">
            <input class="form-control" type="datetime-local" name="start_date"
                   value="<?php echo date_format(new DateTime($task->start_date), 'Y-m-d\TH:i') ?>" placeholder="Starting Date...">
        </div>
        <div class="form-group col-sm-12">
            <input class="form-control" type="datetime-local" name="end_date"
                   value="<?php echo date_format(new DateTime($task->end_date), 'Y-m-d\TH:i') ?>" placeholder="Ending Date...">
        </div>
        <div class="form-group col-sm-12">
            <select name="status" class="form-control">
                <?php foreach (\app\enums\TaskStatus::getStatusName() as $key => $status) :?>
                    <option value="<?php echo $key ?>" <?= ($key == $task->status) ? 'selected' : '' ?>><?php echo $status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<div>

<?php require "app/views/layouts/footer.php" ?>

