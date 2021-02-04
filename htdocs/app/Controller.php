<?php
abstract class Controller{
    public function loadModel(string $model){
        require_once(ROOT. 'models/' . $model . '.php');
        $this->$model = new $model;
    }
}