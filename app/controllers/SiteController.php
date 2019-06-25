<?php


namespace app\controllers;


use app\engine\App;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->title = 'Главная';
        $tasks = App::call()->taskRepository->getAll();
        echo $this->render('index', ['heading' => 'Главная страница', 'tasks' => $tasks]);
    }
}