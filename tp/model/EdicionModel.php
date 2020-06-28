<?php


class EdicionModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerEdiciones(){
        return $this->connexion->query("SELECT * FROM edicion");
    }

    public function obtenerEdicionesDeEjemplar($id){
        return $this->connexion->query("SELECT numero,edicion.nombre,edicion.id FROM edicion inner join ejemplar on '$id'= edicion.id_ejemplar group by id");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $numero=$data["numero"];
        $id_ejemplar=$data["id_ejemplar"];
        $precio=$data["precio"];
        $this->connexion->queryInsert("INSERT INTO edicion (nombre, numero, id_ejemplar, estado, precio) VALUES('$nombre',
        '$numero','$id_ejemplar',false, $precio)");
    }

    public function buscarEdicionEspecífica($nombre, $numero, $ejemplar){
        return $this->connexion->query("SELECT * FROM edicion where nombre like '$nombre' and numero = '$numero'
        and id_ejemplar = '$ejemplar' ");
    }

    public function traerIdDeEdicion(){
        return $this->connexion->query("SELECT max(id) FROM edicion ");
    }

    public function insertarRelacion($edicion, $seccion){
        $this->connexion->queryInsert("INSERT INTO edicionPoseeSeccion VALUES ('$seccion', '$edicion')");
    }

    public function obtenerEdicionPorId($id){
        return $this->connexion->query("select * from edicion where id = '$id'");
    }

    public function update($data){
        $nombre=$data["nombre"];
        $numero=$data["numero"];
        $id_ejemplar=$data["id_ejemplar"];
        $precio=$data["precio"];
        $id=$data["id"];
        return $this->connexion->queryInsert("UPDATE edicion SET nombre='$nombre', id_ejemplar='$id_ejemplar',
        precio='$precio', numero='$numero' WHERE id='$id'");
    }

    public function eliminarRelacion($edicion){
        $this->connexion->queryInsert("delete from edicionposeeseccion where id_edicion='$edicion'");
    }
    public function cambiarEstado($id,$estado){
        return $this->connexion->queryInsert("UPDATE edicion SET estado= $estado WHERE id=$id");
    }
}