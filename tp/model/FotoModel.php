<?php


class FotoModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerEjemplares(){
        return $this->connexion->query("SELECT * FROM foto");
    }

    public function insertar($data){
        $direccion=$data["direccion"];
        $id_noticia=$data["id_noticia"];

        return $this->connexion->query("INSERT INTO foto VALUES('','$direccion','$id_noticia')");
    }
}