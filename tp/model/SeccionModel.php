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
        $nombre=$data["nombre"];
        return $this->connexion->query("INSERT INTO seccion (nombre, estado) VALUES('$nombre',false)");
    }

    public function buscarNombreSeccion($nombre){
        return $this->connexion->query("SELECT * FROM seccion where nombre like '$nombre'");
    }
    
}