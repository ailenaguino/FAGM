<?php


class UsuarioController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function registro(){
        echo $this->renderer->render( "view/regisroView.php" );
    }
    public function index(){
        echo  $this->renderer->render( "view/loginUsuario.php" );
    }
    public function login(){
        $data=array();
        $name=$_POST["usuario"];
        $pass=$_POST["password"];
        $data["user"]=$this->model->logear($name,$pass);
        if($data["user"]){
            echo $this->renderer->render( "view/registrado.php",$data );
        }else{
            echo $this->renderer->render( "view/loginUsuario.php");
        }
    }

    public function procesarFormulario(){
        $data = array();
        $data["nombre_usuario"] = $_POST["usuario"];
        $data["nombre"] = $_POST["nombre"];
        $data["telefono"] = $_POST["telefono"];
        $data["fecha"] = $_POST["fecha"];
        $data["ubicacion"] = $_POST["ubicacion"];
        $data["email"] = $_POST["email"];
        $data["password"] = $_POST["password"];
        $data["password"] = $_POST["password2"];

        $this->model->insertar($data);

        echo $this->renderer->render("view/loginUsuario.php");
    }

    public function mostrar(){
        $data["users"] = $this->model->obtenerUsuarios();
        echo $this->renderer->render( "view/presentacionesView.php", $data);
    }

}