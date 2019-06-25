<?php


namespace app\models;


use app\engine\App;

abstract class Repository
{
    protected $db;


    public function __construct()
    {
        $this->db = App::call()->db;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [":id" => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();

    abstract public function getEntityClass();

}