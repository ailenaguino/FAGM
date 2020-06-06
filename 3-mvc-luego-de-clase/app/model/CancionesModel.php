<?php

class CancionesModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerCanciones(){
        return $this->connexion->query("SELECT * FROM canciones");
    }

    public function obtenerCancion($id){
        return $this->connexion->query("SELECT * FROM canciones WHERE idCancion = $id ");
    }

}