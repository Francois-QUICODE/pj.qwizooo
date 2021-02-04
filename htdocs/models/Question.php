<?php

class Question extends Model{
    public function __construct()
    {
    $this->table = "questions";
    $this->getConnexion();
    }

}