<?php

namespace app\models;

use core\App;

class Task
{
    static $table ='tasks';

    public static function all()
    {
        return App::get('database')->selectAll(Task::$table);
    }

    public static function insert($data = [])
    {
        return App::get('database')->insert(
            Task::$table,
            array_merge($data, [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]));
    }

    public static function delete($id)
    {
        return App::get('database')->delete(
            Task::$table, $id
        );
    }

    public static function allById($id)
    {
        return App::get('database')->selectById(
            Task::$table, $id
        );
    }

    public static function updateById($data, $id)
    {
        App::get('database')->update(
            Task::$table,
            array_merge($data, [
                'updated_at' => date('Y-m-d H:i:s')
            ]),
            $id
        );
    }
}