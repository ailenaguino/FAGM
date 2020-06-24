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

    public function obtenerEjemplares(){
        return $this->connexion->query("SELECT * FROM ejemplar");
    }

    public function insertar($data){
        $nombre=$data["nombre"];
        $numero=$data["numero"];
        $id_ejemplar=$data["id_ejemplar"];
        return $this->connexion->query("INSERT INTO edicion (nombre, numero, id_ejemplar, estado) VALUES('$nombre',
        '$numero','$id_ejemplar',false)");
    }

    public function buscarSeccionEspecífica($nombre, $numero, $ejemplar){
        return $this->connexion->query("SELECT * FROM edicion where nombre like '$nombre' and numero = '$numero'
        and id_ejemplar = '$ejemplar' ");
    }
}