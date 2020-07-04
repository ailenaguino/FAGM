<?php

class UsuarioModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerUsuarios(){
        return $this->connexion->query("SELECT * FROM usuario");
    }

    public function mostrarUsuariosYRolPorId(){
        return $this->connexion->query("select u.id as'id',u.nombre as 'nombre',r.id as 'id_rol', r.nombre as 'rol' from usuario 
        as u
        inner join rol as r 
        on u.id_rol=r.id
        order by u.id
        ");
    }
    public function mostrarUsuariosYRol(){
        return $this->connexion->query("select u.id as'id',u.nombre as 'nombre',r.id as 'id_rol', r.nombre as 'rol' from usuario 
        as u inner join rol as r 
        on u.id_rol=r.id");
    }
    public function busquedaDeUsuarios($username){
        return $this->connexion->query("select * from usuario where nombre like '%$username%'");
    }
    public function consultarNombreUsuario($username){
        return $this->connexion->query("SELECT * FROM usuario WHERE nombre_usuario = '$username'");
    }
    public function consultarEmailUsuario($email){
        return $this->connexion->query("SELECT * FROM usuario WHERE email = '$email'");
    }

    public function obtenerId($nombre_usuario){
        return $this->connexion->query("SELECT id FROM usuario WHERE nombre_usuario like '$nombre_usuario'");
    }
    public function obtenerRolPorId($id){
        return $this->connexion->query("SELECT id_rol FROM usuario WHERE id ='$id'");
    }
    public function obtenerUsuario($id){
        return $this->connexion->query("SELECT * FROM usuario WHERE id = '$id'");
    }
    public function logear($usuario,$password){
        return $this->connexion->query("SELECT * FROM usuario WHERE nombre_usuario like '$usuario' and contrasenia like '$password'");
    }

    public function obtenerRoles(){
        return $this->connexion->query("SELECT * FROM rol");
    }
    
    public function insertar($data){
        $username=$data["usuario"];
        $nombre=$data["nombre"];
        $telefono=$data["telefono"];
        $fecha=$data["fecha"];
        $ubicacion=$data["ubicacion"];
        $email=$data["email"];
        $password=$data["password"];
        $rol=$data['rol'];

        return $this->connexion->queryInsert("INSERT INTO USUARIO VALUES('','$nombre','$username',
            '$password','$fecha','$email','$telefono','$ubicacion','$rol')");
    }

    public function updateRol($id_rol,$id){
        return $this->connexion->queryInsert("UPDATE usuario
        SET id_rol='$id_rol'
        WHERE id='$id'");
    }
    public function obtenerSuscripciones($username){
        return $this->connexion->query("select u.nombre as 'nombre',u.telefono as 'telefono',
        e.nombre as 'ejemplar',e.precio as 'precio',s.fecha as 'fecha' from usuariosuscribeejemplar as s
        inner join ejemplar as e on s.id_ejemplar = e.id
        inner join usuario as u on s.id_usuario = u.id
        where u.nombre_usuario='$username'     
        ");
    }
    public function obtenerCompras($username){
        return $this->connexion->query("select e.nombre as 'edicion',ej.nombre as 'ejemplar',e.precio as 'precio',e.numero as 'numero',u.nombre as 'nombre'
            from usuariocompraedicion as ue
            inner join edicion as e
            on e.id=ue.id_edicion
            inner join usuario as u
            on u.id=ue.id_usuario
            inner join ejemplar as ej
            on ej.id=e.id_ejemplar
            where u.nombre_usuario='$username'");
    }
    public function mostrarContenidistas(){
        return $this->connexion->query("select * from usuario where id_rol=3");
    }

    public function mostrarClientesYProductos(){
        return $this->connexion->query("
            select u.nombre as 'usuario',e.numero as 'edicion',e.nombre as 'nombre_edicion',ej.nombre as 'ejemplar' from usuario as u
            inner join usuariocompraedicion as c
            on u.id=c.id_usuario
            inner join edicion as e
            on c.id_edicion = e.id
            inner join ejemplar as ej
            on ej.id =e.id_ejemplar
            where id_rol=1
            order by u.id;
        ");
    }
    public function suscripcionesDeProducto(){
        return $this->connexion->query("
        select e.nombre as 'ejemplar',count(e.id) as 'total',e.id as 'id' from ejemplar as e
        inner join usuariosuscribeejemplar as ej
        on e.id=ej.id_ejemplar
        group by e.id");
    }
    public function comprasProducto($id_ejemplar){
        return $this->connexion->query("
            select count(e.id) as 'compras' from ejemplar as e
            inner join edicion as ed
            on e.id=ed.id_ejemplar
            inner join usuariocompraedicion as us
            on ed.id=us.id_edicion
            where e.id='$id_ejemplar'
            group by e.id
       ");
    }




}