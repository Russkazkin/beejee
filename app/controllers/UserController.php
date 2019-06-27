<?php


namespace app\controllers;


use app\engine\App;

class UserController extends Controller
{
    public function actionLogin()
    {
        $heading = "Введите ваш логин и пароль";
        $auth = App::call()->authentication;
        if ($auth->isLoggedIn()) {
            header('Location: /');
        }

        if($this->request->getMethod() === 'POST' && isset($this->request->getParams()['password'])){
            if(!$auth->userAuth()){
                $heading = 'Неправильный пользователь и/или пароль!';
            }else{
                header('Location: /');
            }
        }
        $this->title = 'Login';
        echo $this->render('user/login', ['heading' => $heading]);
    }

    public function actionLogout()
    {
        App::call()->authentication->logout();
    }

}