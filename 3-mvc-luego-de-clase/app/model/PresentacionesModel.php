<?php

class PresentacionesModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getPresentaciones(){
        return $this->database->query("SELECT * FROM presentaciones");
    }
}