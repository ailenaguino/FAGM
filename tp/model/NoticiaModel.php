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
    public function obtenerFoto($id){
        return $this->connexion->query("SELECT direccion FROM foto where id_noticia = '$id'");
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
        return $this->connexion->queryInsert("insert into foto values('','$dir','$id')");
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
    public function ultimaFoto(){
        return $this->connexion->query("select max(id) as id from foto");
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

        print_r($data);
        return $this->connexion->queryInsert("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario',false)");

    }
}