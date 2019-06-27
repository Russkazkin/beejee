<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Task;
use \Exception;
use JasonGrimes\Paginator;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $totalItems = App::call()->taskRepository->getCount();
        $itemsPerPage = 3;
        $currentPage = 1;
        $urlPattern = '/task/page/(:num)';
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $this->title = 'Tasks';
        $key = $this->session->getProp('sortBy') ?: 'status';
        $order = $this->session->getProp('sortOrder') ?: 'asc';
        $tasks = App::call()->taskRepository->getSorted($key, $order, $itemsPerPage, 0);
        echo $this->render('index', [
            'heading' => 'Tasks',
            'tasks' => $tasks,
            'sortBy' => $key,
            'sortOrder' => $order,
            'userRole' => $this->userRole,
            'paginator' => $paginator]);
    }

    public function actionAdd()
    {
        if(isset($this->request->getParams()['name'])) {
            $task = new Task(
                null,
                $this->request->getParams()['name'],
                $this->request->getParams()['email'],
                $this->request->getParams()['text']);
            App::call()->taskRepository->save($task);
            header('Location: /task/');
        }
        $this->title = 'Add Task';
        echo $this->render('task/add', ['heading' => 'Add Task']);
    }

    public function actionComplete()
    {
        if ($this->userRole != 1) {
            throw new Exception('Forbidden', 403);
        }
        $id = $this->request->getActionParam();
        $task = App::call()->taskRepository->getOne($id);
        $task->setProp('status', 1);
        App::call()->taskRepository->save($task);
        header('Location: /task/');
    }

    public function actionEdit()
    {
        if ($this->userRole != 1) {
            throw new Exception('Forbidden', 403);
        }
        $id = $this->request->getActionParam();
        $task = App::call()->taskRepository->getOne($id);
        if(isset($this->request->getParams()['text'])) {
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
        if(isset($this->request->getParams()['sortBy'])){
            $this->session->setProp('sortBy', App::call()->request->getParams()['sortBy']);
            $this->session->setProp('sortOrder', App::call()->request->getParams()['sortOrder']);
            header('Location: /task/');
        }else{
            throw new Exception('Sorting Error');
        }
    }

    public function actionPage()
    {
        $totalItems = App::call()->taskRepository->getCount();
        $itemsPerPage = 3;
        $currentPage = $this->request->getActionParam();
        $urlPattern = '/task/page/(:num)';
        $offset = $currentPage * $itemsPerPage - $itemsPerPage;
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $this->title = 'Tasks';
        $key = $this->session->getProp('sortBy') ?: 'status';
        $order = $this->session->getProp('sortOrder') ?: 'asc';
        $tasks = App::call()->taskRepository->getSorted($key, $order, $itemsPerPage, $offset);
        echo $this->render('index', [
            'heading' => 'Tasks',
            'tasks' => $tasks,
            'sortBy' => $key,
            'sortOrder' => $order,
            'userRole' => $this->userRole,
            'paginator' => $paginator]);
    }
}