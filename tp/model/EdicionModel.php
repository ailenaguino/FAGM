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

    public function obtenerEjemplares(){
        return $this->connexion->query("SELECT * FROM ejemplar");
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM seccion");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $numero=$data["numero"];
        $id_ejemplar=$data["id_ejemplar"];
        $this->connexion->queryInsert("INSERT INTO edicion (nombre, numero, id_ejemplar, estado) VALUES('$nombre',
        '$numero','$id_ejemplar',false)");
    }

    public function buscarEdicionEspecífica($nombre, $numero, $ejemplar){
        return $this->connexion->query("SELECT * FROM edicion where nombre like '$nombre' and numero = '$numero'
        and id_ejemplar = '$ejemplar' ");
    }

    public function traerIdDeEdicion($nombre, $numero, $ejemplar){
        return $this->connexion->query("SELECT max(id) FROM edicion ");
    }

    public function insertarRelacion($data, $num){
        $this->connexion->queryInsert("INSERT INTO edicionPoseeSeccion VALUES ('$num', '$data')");
    }
}