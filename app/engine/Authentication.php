<?php


namespace app\engine;


class Authentication
{
    protected $db;

    public function __construct()
    {
        $this->db = App::call()->db;
        $this->request = App::call()->request;
    }

    public function userAuth()
    {
        $login = $this->request->getParams()['login'];
        $password = $this->request->getParams()['password'];
        $isAuth = false;

        $sql = "SELECT `id`, `login`, `password`, `name`, `role` FROM `user` WHERE `login` = :login";
        $userData = $this->db->queryOne($sql, ['login' => $login]);
        if ($userData) {
            if($this->passwordCheck($password, $userData['password'])){
                $isAuth = true;
                $_SESSION['user'] = $userData;
            }
        }
        return $isAuth;
    }

    public function passwordHash($password)
    {
        $configSalt = App::call()->config['salt'];
        $salt = md5(uniqid($configSalt, true));
        $salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
        return crypt($password, 'ec6Yeisaij0iraed' . $salt);
    }

    public function passwordCheck($password, $hash)
    {
        return $this->passwordHash($password) === $hash;
    }

    public function isLoggedIn()
    {
        return App::call()->session->getProp('user');
    }

    public function getUserId(){
        if ($this->isLoggedIn()) {
            return App::call()->session->getProp('user')['id'];
        }
        return null;
    }

    public function getUserRole(){
        if ($this->isLoggedIn()) {
            return App::call()->session->getProp('user')['role'];
        }
        return null;
    }

}