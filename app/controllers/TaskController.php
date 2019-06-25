<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Task;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $this->title = 'Tasks';
        $tasks = App::call()->taskRepository->getAll();
        echo $this->render('index', ['heading' => 'Tasks', 'tasks' => $tasks]);
    }

    public function actionAdd()
    {
        if(isset(App::call()->request->getParams()['name'])) {
            $task = new Task(null,
                            App::call()->request->getParams()['name'],
                            App::call()->request->getParams()['email'],
                            App::call()->request->getParams()['text']);
            App::call()->taskRepository->save($task);
            header('Location: /task/');
        }
        $this->title = 'Add Task';
        echo $this->render('task/add', ['heading' => 'Add Task']);
    }
}