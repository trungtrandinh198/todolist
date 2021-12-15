<?php
namespace core\database;

use \PDO;

class Connection
{
    public static function make($config)
    {
        ini_set('display_errors', true);
        error_reporting(E_ALL);
        try {
            return new PDO(
                sprintf('%s:host=%s:%s;dbname=%s',
                    $config['driver'],
                    $config['hostname'],
                    $config['port'],
                    $config['name']
                ),
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch(\PDOException $e) {
            die("Databse connect failed!");
            die($e->getMessage());
        }
    }
}