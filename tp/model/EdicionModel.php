<?php


class EdicionModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM edicion");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $numero=$data["numero"];
        $id_ejemplar=$data["id_ejemplar"];
        return $this->connexion->query("INSERT INTO edicion VALUES('','$nombre',
        '$numero','$id_ejemplar',false)");
    }
}