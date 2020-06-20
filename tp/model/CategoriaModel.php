<?php


class CategoriaModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerCategorias(){
        return $this->connexion->query("SELECT * FROM categoria");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        return $this->connexion->query("INSERT INTO categoria (nombre) VALUES('$nombre')");
    }

    public function buscarNombreCategoria($nombre){
        return $this->connexion->query("SELECT * FROM categoria where nombre like '$nombre'");
    }
}