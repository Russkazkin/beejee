<?php


namespace app\engine;


use app\controllers\SiteController;
use app\models\repositories\TaskRepository;
use app\traits\TSingleton;

/**
 * Class App
 * @property Request $request
 * @property Session $session
 * @property TaskRepository $taskRepository
 * @property Db $db
 */

class App
{
    use TSingleton;

    public $config;

    /** @var Storage */
    //хранилище компонентов-объектов
    private $components;


    private $controller;
    private $action;
    private $actionParam;

    /**
     * @return static
     */
    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;

        $this->components = new Storage();
        $this->runController();
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'task';
        $this->action = $this->request->getActionName();
        $this->actionParam = $this->request->getActionParam();

        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new TwigRender());
        } else {
            $controller = new SiteController(new TwigRender());
            $this->action = $this->controller;
        }
        $controller->param = $this->actionParam;
        $controller->runAction($this->action);
    }

    function __get($name)
    {
        return $this->components->get($name);
    }
}