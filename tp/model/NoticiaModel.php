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

    public function insertar($data){
        $video=$data["video"];
        $link=$data["link"];
        $ubicacion=$data["ubicacion"];
        $contenido=$data["contenido"];
        $subtitulo=$data["subtitulo"];
        $titulo=$data["titulo"];
        $id_seccion=$data["id_seccion"];
        $id_usuario=$data["id_usuario"];

        return $this->connexion->query("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario',false)");
    }
    public function obtenerNoticia($id){
        return $this->connexion->query("SELECT * FROM noticia WHERE id = $id");
    }
    public function cambiarEstado($id,$estado){
        return $this->connexion->query("UPDATE noticia SET estado= $estado WHERE id=$id");
    }
    public function eliminar($id){
        return $this->connexion->query("DELETE FROM noticia WHERE id=$id");
    }
}