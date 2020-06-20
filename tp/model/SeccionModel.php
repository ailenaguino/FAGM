<?php


class SeccionModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM seccion");
    }

    public function insertar($data){
        $username=$data["usuario"];
        $nombre=$data["nombre"];
        return $this->connexion->query("INSERT INTO seccion VALUES('','$nombre',false)");
    }
    
}