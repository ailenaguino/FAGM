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
                                        where n.estado = 1
                                        and n.precio in (0,0.0,0.00)
                                        group by n.id");
    }
    public function obtenerNoticiaPorEdicion($id_edicion){
        return $this->connexion->query("select * from noticia
        where id_edicion = '$id_edicion'");
    }
    public function obtenerNoticiasPremium(){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion from foto as f
                                        inner join noticia as n
                                        on f.id_noticia=n.id
                                        where n.estado = 1
                                        and n.precio not in (0,0.0,0.00)
                                        group by n.id");
    }
    public function obtenerUltimaNoticia(){
        return $this->connexion->query("select n.id,f.direccion,n.titulo,n.subtitulo,n.ubicacion,u.nombre from noticia as n
        inner join foto as f
        on f.id_noticia = n.id
        inner join usuario as u
        on u.id = n.id_usuario
        where n.id in(
            select max(id) from noticia
            where estado=1
            and precio in (0,0.0,0.00))");
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
        $id_edicion=$data['id_edicion'];

        return $this->connexion->queryInsert("INSERT INTO noticia VALUES(
        '','$video','$link','$ubicacion','$contenido','$subtitulo',
        '$titulo','$id_seccion','$id_usuario','$id_edicion','$precio',false)");

    }

    public function obtenerNoticiasPagas($id){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion, e.nombre as nombreEjemplar 
        from usuario as u 
        inner join usuariosuscribeejemplar as se
        on '$id'= se.id_usuario
        inner join ejemplar as e
        on se.id_ejemplar = e.id
        inner join edicion as ed
        on ed.id_ejemplar=e.id
        inner join noticia as n
        on n.id_edicion=ed.id
        inner join foto as f
        on n.id = f.id_noticia
        where n.estado = '1'
        group by n.id");
    }

    public function obtenerNoticiasPagasEdicion($id){
        return $this->connexion->query("select n.id,n.titulo,n.subtitulo, f.direccion, ed.nombre as nombreEdicion from usuario as u 
                                        inner join usuariocompraedicion as ce
                                        on '$id' = ce.id_usuario
                                        inner join edicion as ed
                                        on ce.id_edicion = ed.id							
                                        inner join noticia as n
                                        on ed.id = n.id_edicion
                                        inner join foto as f
                                        on n.id = f.id_noticia
                                        where n.estado = '1'
                                        group by n.id");

    }
    public function obtenerNoticiasSuscritasOCompradas($id,$id_noticia){
        return $this->connexion->query("
            (select n.id from usuariocompraedicion as uc
            inner join noticia as n
            on n.id_edicion=uc.id_edicion
            where uc.id_usuario = '$id' and n.id='$id_noticia')
            union
            (select n.id from usuariosuscribeejemplar as uc
            inner join ejemplar as ej
            on ej.id=uc.id_ejemplar
            inner join edicion as e
            on e.id_ejemplar=ej.id
            inner join noticia as n
            on n.id_edicion=e.id
            where uc.id_usuario= '$id' and n.id='$id_noticia');");
    }

    public function obtenerNoticiasConSeccionYUsuario(){
        return $this->connexion->query("
            select n.id as id, n.titulo,s.nombre as seccion,u.nombre as usuario,n.estado as estado from noticia as n
            inner join seccion as s 
            on s.id=n.id_seccion
            inner join usuario as u 
            on u.id=n.id_usuario
        ");
    }


}