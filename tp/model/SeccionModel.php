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
        return $this->connexion->queryInsert("INSERT INTO seccion (nombre, estado) VALUES('$nombre',false)");
    }

    public function buscarNombreSeccion($nombre){
        return $this->connexion->query("SELECT * FROM seccion where nombre like '$nombre'");
    }
    public function obtenerSeccionesPorEdicion($id_edicion){
        return $this->connexion->query("select e.id_seccion,s.nombre from edicion as ed inner join edicionPoseeSeccion as e
        on ed.id = e.id_edicion 
        inner join seccion as s
        on s.id = e.id_seccion
        where ed.id='$id_edicion'");
    }

    public function obtenerSeccionPorId($id){
        return $this->connexion->query("select * from seccion where id = '$id'");
    }

    public function update($data){
        $nombre=$data["nombre"];
        $id=$data["id"];
        return $this->connexion->queryInsert("UPDATE seccion SET nombre='$nombre' WHERE id='$id'");
    }
    public function cambiarEstado($id,$estado){
        return $this->connexion->queryInsert("UPDATE seccion SET estado= $estado WHERE id=$id");
    }
}