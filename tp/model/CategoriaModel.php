<?php


class CategoriaModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM categoria");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        return $this->connexion->query("INSERT INTO categoria VALUES('','$nombre')");
    }
}