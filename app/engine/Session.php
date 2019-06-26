<?php


namespace app\engine;


use \Exception;

class Session
{
    public function setProp($prop, $value)
    {
        $_SESSION[$prop] = $value;
    }

    public function getProp($prop)
    {
        if (isset($_SESSION[$prop])) {
            return $_SESSION[$prop];
        } else {
            throw new Exception("Session property with name {$prop} not found", 404);
        }
    }

    public function unsetProp($prop)
    {
        if (isset($_SESSION[$prop])) {
            unset($_SESSION[$prop]);
        } else {
            throw new Exception("Session property with name {$prop} not found", 404);
        }
    }
}