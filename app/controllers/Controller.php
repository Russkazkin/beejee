<?php


namespace app\controllers;


use app\engine\Authentication;
use app\engine\Request;
use app\interfaces\IRender;
use Exception;

class Controller implements IRender
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    public $param;
    public $title = 'Undefined title';
    public $userName;
    private $renderer;
    public $request;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRender $renderer)
    {
        $this->renderer = $renderer;
        $this->userName = $_SESSION['user']['name'] ?: null;
        $this->request = new Request();
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new Exception('Page not found', 404);
        }
    }

    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                [
                    'content' => $this->renderTemplate($template, $params),
                    'title' => $this->title,
                    'userName' => $this->userName,
                ]
            );
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }
}