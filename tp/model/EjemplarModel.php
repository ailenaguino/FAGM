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
        $precio=$data["precio"];

        $result= $this->connexion->queryInsert("INSERT INTO ejemplar VALUES('','$nombre',
        '$id_categoria',false,'$precio')");
        return $result;
    }

    public function buscarEjemplarDeCategoria($nombre, $categoria){
        return $this->connexion->query("SELECT * FROM ejemplar where nombre like '$nombre' and id_categoria = '$categoria'");
    }
}