<?php


namespace app\models\repositories;


use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName()
    {
        return 'user';
    }

    public function getEntityClass()
    {
        return User::class;
    }
}