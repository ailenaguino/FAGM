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

    public function obtenerUsuario($id){
        return $this->connexion->query("SELECT * FROM usuario WHERE id = $id");
    }
    public function logear($usuario,$password){
        return $this->connexion->query("SELECT * FROM usuario WHERE nombre_usuario like '$usuario' and contrasenia like '$password'");
    }
    public function insertar($data){
        $username=$data["nombre_usuario"];
        $nombre=$data["nombre"];
        $telefono=$data["telefono"];
        $fecha=$data["fecha"];
        $ubicacion=$data["ubicacion"];
        $email=$data["email"];
        $password=$data["password"];

        return $this->connexion->query("INSERT INTO USUARIO VALUES('','$nombre','$username','$password','$fecha','$email','$telefono','$ubicacion',1)");
    }

}