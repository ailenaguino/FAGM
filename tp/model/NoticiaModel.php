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
    public function obtenerNoticiaGratis(){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion from foto as f
                                        inner join noticia as n
                                        on f.id_noticia=n.id
                                        where n.estado = '1' and n.precio in (0,0.0,0.00)
                                        group by n.id");
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
        $precio=$data["precio"];

        return $this->connexion->queryInsert("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario','$precio',false)");

    }

    public function obtenerNoticiasPagas($id){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion, e.nombre as nombreEjemplar from usuario as u 
                                        inner join usuariosuscribeejemplar as se
                                        on $id = se.id_usuario
                                        inner join ejemplar as e
                                        on se.id_ejemplar = e.id
                                        inner join edicion as ed
                                        on e.id = ed.id_ejemplar
                                        inner join edicionposeeseccion as eps
                                        on ed.id = eps.id_edicion
                                        inner join seccion as s
                                        on eps.id_seccion = s.id
                                        inner join noticia as n
                                        on s.id = n.id_seccion
                                        inner join foto as f
                                        on n.id = f.id_noticia
                                        where n.estado = '1'
                                        group by n.id");
    }

    public function obtenerNoticiasPagasEdicion($id){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion, ed.nombre as nombreEdicion from usuario as u 
                                        inner join usuariocompraedicion as ce
                                        on $id = ce.id_usuario
                                        inner join edicion as ed
                                        on ce.id_edicion = ed.id
                                        inner join edicionposeeseccion as eps
                                        on ed.id = eps.id_edicion
                                        inner join seccion as s
                                        on eps.id_seccion = s.id
                                        inner join noticia as n
                                        on s.id = n.id_seccion
                                        inner join foto as f
                                        on n.id = f.id_noticia
                                        where n.estado = '1'
                                        group by n.id");

    }


}