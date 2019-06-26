<?php


namespace app\models\repositories;


use app\models\entities\Task;
use app\models\Repository;

class TaskRepository extends Repository
{
    public function getEntityClass()
    {
        return Task::class;
    }

    public function getTableName()
    {
        return 'task';
    }

}