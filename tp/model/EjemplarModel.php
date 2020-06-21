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

    public function obtenerCategorias(){
        return $this->connexion->query("SELECT * FROM categoria");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $id_categoria=$data["id_categoria"];

        return $this->connexion->query("INSERT INTO ejemplar (nombre, id_categoria, estado) VALUES('$nombre',
        '$id_categoria',false)");
    }

    public function buscarEjemplarDeCategoria($nombre, $categoria){
        return $this->connexion->query("SELECT * FROM ejemplar where nombre like '$nombre' and id_categoria = '$categoria'");
    }
}