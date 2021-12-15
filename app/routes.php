<?php

$router->get("", "TaskController@index");
$router->post("tasks/insert", "TaskController@store");
$router->post("tasks/delete", "TaskController@delete");
$router->get("tasks/show", "TaskController@show");
$router->post("tasks/edit", "TaskController@edit");