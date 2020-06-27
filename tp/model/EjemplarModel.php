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

    public function obtenerEjemplarPorId($id){
        return $this->connexion->query("select * from ejemplar where id = '$id'");
    }

    public function update($data){
        $nombre=$data["nombre"];
        $categoria=$data["id_categoria"];
        $precio=$data["precio"];
        $id=$data["id"];
        return $this->connexion->queryInsert("UPDATE ejemplar SET nombre='$nombre', id_categoria='$categoria',
        precio='$precio' WHERE id='$id'");
    }

}