<?php


class SeccionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render("view/agregarSeccion.php");
    }
    public function listar(){
        $data["secciones"] = $this->model->obtenerSecciones();
        echo $this->renderer->render("view/listarSecciones.php", $data);
    }
    public function listarConMensaje($mensaje){
        $data["secciones"] = $this->model->obtenerSecciones();
        $data["mensaje"]=$mensaje["mensaje"];
        echo $this->renderer->render("view/listarSecciones.php", $data);
    }

    public function editar(){
        $id=$_POST["id"];
        $data["seccion"] = $this->model->obtenerSeccionPorId($id);
        echo $this->renderer->render("view/editarSeccion.php", $data);
    }

    public function validarEdicion(){
        $data["id"]=$_POST["id"];
        $data2["seccion"] = $this->model->obtenerSeccionPorId($data["id"]);
        $data["nombre"]=ucfirst($_POST["nombre"]);
        $nombreViejo=$_POST["nombreViejo"];

        $resultado = $this->validarNombre($data["nombre"]);
        $data2["mensaje"] = "No se puede editar la sección";

        if($resultado) {
            if(strcasecmp($data["nombre"], $nombreViejo) != 0){
                $this->model->update($data);
                $data2["mensaje"] = "Seccion editada correctamente";
            }
        }
        echo $this->renderer->render("view/editarSeccion.php", $data2);
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);

        $resultado = $this->validarNombre($data["nombre"]);

        if($resultado==true) {
            $this->model->insertar($data);

            $mensaje["mensaje"] = "Seccion agregada correctamente";
        }else{
            $mensaje["mensaje"] = "Seccion incorrecta";
        }

       // echo $this->renderer->render("view/agregarSeccion.php", $mensaje);
       echo $this->listarConMensaje($mensaje);
    }

    public function validarNombre($nombre){
        $resultado = $this->model->buscarNombreSeccion(ucfirst($nombre));

        if($resultado!=null) {
            return false;
        }elseif(!ctype_alpha($nombre)){
            return false;
        }else {
            return true;
        }
    }

    public function obtenerSecciones(){
        $secciones["sesion"]=$this->model->obtenerSecciones();
        echo $this->renderer->render( "view/elegirSeccion.php",$secciones);
    }

    public function listaAdmin(){
        $data["secciones"] = $this->model->obtenerSecciones();
        echo $this->renderer->render("view/listaSeccionesAdmin.php", $data);
    }
    public function listaConte(){
        $data["secciones"] = $this->model->obtenerSecciones();
        echo $this->renderer->render("view/listaSeccionesConte.php", $data);
    }
    public function cambiarEstado()
    {
        $id = $_POST["id"];
        $estado = $_POST["estado"];
        if ($estado == 1) {
            $estado = 0;
        } else {
            $estado = 1;
        }
        $this->model->cambiarEstado($id, $estado);
        $data["secciones"] = $this->model->obtenerSecciones();
        echo $this->renderer->render("view/listaSeccionesAdmin.php", $data);
    }

    public function mostrarSeccionesDeLaEdicion(){
        $idEdicion = $_POST['id'];
        $data["secciones"]=$this->model->obtenerSeccionesPorEdicion($idEdicion);
        echo $this->renderer->render( "view/mostrarSeccionesDeLaEdicion.php",$data);
    }

}