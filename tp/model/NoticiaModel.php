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
    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM seccion");
    }
    public function obtenerEjemplares(){
        return $this->connexion->query("SELECT * FROM ejemplar");
    }
    public function obtenerEdiciones($id){
        return $this->connexion->query("SELECT numero,edicion.nombre,edicion.id FROM edicion inner join ejemplar on '$id'= edicion.id_ejemplar group by id");
    }
    public function guardarImagen($dir,$id){
        return $this->connexion->query("insert into foto values('','$dir','$id')");
    }
    public function obtenerSeccionesPorEdicion($id_edicion){
        return $this->connexion->query("select e.id_seccion,s.nombre from edicion as ed inner join edicionPoseeSeccion as e
        on ed.id = e.id_edicion 
        inner join seccion as s
        on s.id = e.id_seccion
        where ed.id='$id_edicion'");
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

        return $this->connexion->query("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario',false)");
    }
}