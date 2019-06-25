<?php


namespace app\models\entities;


use Exception;

class DataEntity
{
    public $updateFlags = [];

    public function __construct()
    {
        foreach ($this as $key => $value) {
            $this->updateFlags[$key] = false;
        }
    }

    public function getProp($prop)
    {
        return $this->$prop;
    }

    public function setProp($prop, $value)
    {
        if(isset($this->$prop)) {
            $this->updateFlags[$prop] = true;
            $this->$prop = $value;
        }else{
            throw new Exception('Property not found');
        }
    }

    public function getTwigArr()
    {
        $propsArr = [];
        foreach ($this->updateFlags as $key => $flag){
            $propsArr[$key] = $this->getProp($key);
        }
        return $propsArr;
    }
}