<?php
namespace core\database;

use \PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
         $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($table, $id)
    {
        $statement = $this->pdo->prepare("select * from {$table} where id = {$id}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
    }

    public function delete($table, $id)
    {
        $sql = sprintf("delete from %s where id = %s",
            $table,
            $id
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function update($table, $parameters, $condition)
    {
        $result = [];
        $keys = array_keys($parameters);
        $values = array_values($parameters);
        for($i=0; $i< count($parameters); $i++) {
            if(gettype($values[$i]) === "string")
                $temp = $keys[$i] . "='" .$values[$i]. "'";
            else
                $temp = $keys[$i] . "=" .$values[$i];
            array_push($result, $temp);
        }
        $sql = sprintf(
            'update %s set %s where id=%s',
            $table,
            implode(',', $result),

            $condition
        );
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }
}