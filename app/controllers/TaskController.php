<?php

namespace app\controllers;

use app\models\Task;

class TaskController
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public static function store()
    {
        $data = [
            'name'       => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date'   => $_POST['end_date'],
            'status'     => $_POST['status'],
        ];
        Task::insert($data);

        return redirect('/');
    }

    public static function delete()
    {
        Task::delete($_POST['id']);

        return redirect('/');
    }

    public static function show()
    {
        $task = Task::allById($_GET['id'])[0];

        return view("tasks.show", compact("task"));
    }

    public static function edit()
    {
        $data = [
            'name'       => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date'   => $_POST['end_date'],
            'status'     => $_POST['status'],
        ];
        Task::updateById($data, $_POST['id']);

        return redirect('/');
    }
}