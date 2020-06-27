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
    public function mostrarUsuariosYRolPorId($id_usuario){
        return $this->connexion->query("select u.id as'id',u.nombre as 'nombre',r.id as 'id_rol', r.nombre as 'rol' from usuario 
        as u
        inner join rol as r 
        on u.id_rol=r.id
        having u.id='$id_usuario'
        ");
    }
    public function mostrarUsuariosYRol(){
        return $this->connexion->query("select u.id as'id',u.nombre as 'nombre',r.id as 'id_rol', r.nombre as 'rol' from usuario 
        as u inner join rol as r 
        on u.id_rol=r.id");
    }
    public function busquedaDeUsuarios($username){
        return $this->connexion->query("select * from usuario where nombre like '%$username%';
");
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

        return $this->connexion->query("INSERT INTO USUARIO VALUES('','$nombre','$username',
            '$password','$fecha','$email','$telefono','$ubicacion',1)");
    }

    public function updateRol($id_rol,$id){
        return $this->connexion->queryInsert("UPDATE usuario
        SET id_rol='$id_rol'
        WHERE id='$id'");
    }

}