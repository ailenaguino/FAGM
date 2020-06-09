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
        if(isset($_SESSION['name'])){
            $data=array();
            $data["sesion"]=$_SESSION;
            echo  $this->renderer->render( "view/registrado.php",$data);
        }else{
            echo  $this->renderer->render( "view/loginUsuario.php" );
        }
    }

    public function validarUserName($username){
        $result= $this->model->consultarNombreUsuario($username);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function validarEmail($email){
        $result= $this->model->consultarEmailUsuario($email);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function validarContra($pass1,$pass2){
        if($pass1==$pass2){
            return true;
        }else{
            return false;
        }
    }
    public function validar($email,$user,$pass1,$pass2){
        if($this->validarEmail($email)){
            throw new Exception("El email ya existe");
        }
        if($this->validarUserName($user)){
            throw new Exception("El username ya existe");
        }
        if(!$this->validarContra($pass1,$pass2)){
            throw new Exception("Las contrasenias no coinciden");
        }
    }
    public function validarLogin(){
        $data = array();

        $data["nombre"] = $_POST["nombre"];
        $data["telefono"] = $_POST["telefono"];
        $data["fecha"] = $_POST["fecha"];
        $data["ubicacion"] = $_POST["ubicacion"];
        $data["password"]="";
        $data["email"]="";
        $data["usuario"]="";
        $error=array();
        try {
            $this->validar($_POST["email"],$_POST["usuario"],$_POST["password"],$_POST["password2"]);
            $data["password"]=$_POST["password"];
            $data["email"]=$_POST["email"];
            $data["usuario"]=$_POST["usuario"];
            $this->guardar($data);
        }catch (Exception $e){
            $error["error"]=$e->getMessage();
            echo $this->renderer->render( "view/regisroView.php",$error);
        }
    }

    public function login(){
        $data=array();
        if(isset($_POST["usuario"]) && isset($_POST["password"])){
            $name=$_POST["usuario"];
            $pass=$_POST["password"];
            $data["user"]=$this->model->logear($name,$pass);
            if($data["user"]){
                $_SESSION['name']=$name;
                $_SESSION['pass']=$pass;
                $sesion["sesion"]=$_SESSION;
                //si le parece raro, disculpe, estabamos re quemados ☻
                echo $this->renderer->render( "view/registrado.php",$sesion );
            }else{
                echo $this->renderer->render( "view/loginUsuario.php");
            }
        }else{
            echo $this->renderer->render( "view/loginUsuario.php");
        }
    }

    public function cerrarSesion(){
        if(isset($_SESSION['name'])){
            session_destroy();
            echo $this->renderer->render( "view/loginUsuario.php");
        }else{
            echo $this->renderer->render( "view/loginUsuario.php");
        }
    }

    public function guardar($data){
        $this->model->insertar($data);
        $this->index();
    }

    public function mostrar(){
        $data["users"] = $this->model->obtenerUsuarios();
        echo $this->renderer->render( "view/presentacionesView.php", $data);
    }

}