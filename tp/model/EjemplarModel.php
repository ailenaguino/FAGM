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

    public function obtenerEjemplaresConSusCategorias(){
        return $this->connexion->query("select  ejemplar.nombre as ejemplar,categoria.nombre as categoria, ejemplar.precio, ejemplar.id from ejemplar
                                            inner join categoria
                                            on categoria.id = ejemplar.id_categoria
                                            where ejemplar.estado = '1'");
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
    public function cambiarEstado($id,$estado)
    {
        return $this->connexion->queryInsert("UPDATE ejemplar SET estado= $estado WHERE id=$id");
    }
}