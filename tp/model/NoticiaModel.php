<?php


class NoticiaModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }
    public function obtenerNoticias(){
        return $this->connexion->query("SELECT * FROM noticia");
    }
    public function obtenerNoticia($id){
        return $this->connexion->query("SELECT * FROM noticia where id = '$id'");
    }
    public function cambiarEstado($id,$estado){
        return $this->connexion->queryInsert("UPDATE noticia SET estado= $estado WHERE id=$id");
    }
    public function eliminar($id){
        return $this->connexion->query("DELETE FROM noticia WHERE id=$id");
    }

    public function ultimoId(){
        return $this->connexion->query("select max(id) as id from noticia");
    }

    public function insertar($data){
        $video=$data["video"];
        $link=$data["link"];
        $ubicacion=$data["ubicacion"];
        $contenido=$data["contenido"];
        $subtitulo=$data["subtitulo"];
        $titulo=$data["titulo"];
        $id_seccion=$data["id_seccion"];
        $id_usuario=$data["id_usuario"];

        return $this->connexion->queryInsert("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario',false)");

    }
}