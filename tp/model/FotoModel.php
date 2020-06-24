<?php


class FotoModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerFoto($id){
        return $this->connexion->query("SELECT direccion FROM foto where id_noticia = '$id'");
    }

    public function guardarImagen($dir,$id){
        return $this->connexion->queryInsert("insert into foto values('','$dir','$id')");
    }

    public function ultimaFoto(){
        return $this->connexion->query("select max(id) as id from foto");
    }

}