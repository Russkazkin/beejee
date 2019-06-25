<?php


namespace app\models;


use app\engine\App;
use app\models\entities\DataEntity;

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

    public function insert(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $cols = '';
        $binds = '';
        $arr = [];

        foreach ($entity->updateFlags as $key => $value) {
            if ($key == "updateFlags") continue;
            $cols .= "{$key}, ";
            $binds .= ":{$key}, ";
            $arr[$key] = $entity->getProp($key);
        }

        $cols = substr($cols, 0, -2);
        $binds = substr($binds, 0, -2);
        $sql = "INSERT INTO {$tableName} ({$cols}) VALUES ({$binds})";

        $this->db->execute($sql, $arr);
        $entity->id = $this->db->lastInsertId();

        return true;
    }

    public function save(DataEntity $entity)
    {

        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    abstract public function getTableName();

    abstract public function getEntityClass();

}