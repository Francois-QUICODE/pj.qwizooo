<?php


class Questions extends Controller
{
    public function index(){
        $this->loadModel("Question");
        $questions = $this->Question->getAll();
        var_dump($questions);
        var_dump($this->Question);
        echo 'Index des questions';
    }
}