<?php


class EjemplarModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerEjemplares(){
        return $this->connexion->query("SELECT * FROM ejemplar");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $id_categoria=$data["id_categoria"];

        return $this->connexion->query("INSERT INTO ejemplar VALUES('','$nombre',
        '$id_categoria',false)");
    }
}