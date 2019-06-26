<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Task;
use \Exception;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $this->title = 'Tasks';
        $key = App::call()->session->getProp('sortBy') ?: 'status';
        $order = App::call()->session->getProp('sortOrder') ?: 'asc';
        $tasks = App::call()->taskRepository->getSorted($key, $order);
        echo $this->render('index', [
            'heading' => 'Tasks',
            'tasks' => $tasks,
            'sortBy' => $key,
            'sortOrder' => $order]);
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

    public function actionSort()
    {
        if(isset(App::call()->request->getParams()['sortBy'])){
            App::call()->session->setProp('sortBy', App::call()->request->getParams()['sortBy']);
            App::call()->session->setProp('sortOrder', App::call()->request->getParams()['sortOrder']);
            header('Location: /task/');
        }else{
            throw new Exception('Sorting Error');
        }
    }
}