<?php


namespace app\models\entities;


class User extends DataEntity
{
    protected $id;
    protected $login;
    protected $password;
    protected $name;
    protected $email;
    protected $role;

    public function __construct($login = null,
                                $password = null,
                                $name = null,
                                $email = null,
                                $role = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;

        parent::__construct();
    }
}
