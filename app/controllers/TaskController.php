<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Task;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $this->title = 'Tasks';
        $key = 'status';
        $order = 'asc';
        $tasks = App::call()->taskRepository->getSortedTasks($key, $order);
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

    public function actionComplete()
    {
        $id = App::call()->request->getActionParam();
        $task = App::call()->taskRepository->getOne($id);
        $task->setProp('status', 1);
        App::call()->taskRepository->save($task);
        header('Location: /task/');
    }

    public function actionEdit()
    {
        $id = App::call()->request->getActionParam();
        $task = App::call()->taskRepository->getOne($id);
        if(isset(App::call()->request->getParams()['text'])) {
            $task->setProp('text', App::call()->request->getParams()['text']);
            App::call()->taskRepository->save($task);
            header('Location: /task/');
        }
        $text = $task->getProp('text');
        $this->title = 'Edit Task';
        echo $this->render('task/edit', ['heading' => 'Edit Task', 'text' => $text]);
    }
}