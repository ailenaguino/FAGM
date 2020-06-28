<?php


class EdicionController
{
    private $renderer;
    private $model;
    private $modelEjemplar;
    private $modelSeccion;

    public function __construct($model, $renderer, $ejemplar, $seccion){
        $this->renderer = $renderer;
        $this->model = $model;
        $this->modelEjemplar = $ejemplar;
        $this->modelSeccion = $seccion;
    }

    public function index(){
        $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/agregarEdicion.php", $data);
    }

    public function listar(){
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listarEdiciones.php", $data);
    }

    public function editar(){
        $id=$_POST["id"];
        $data["edicion"] = $this->model->obtenerEdicionPorId($id);
        $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/editarEdicion.php", $data);
    }

    public function validarEdicion(){
        $data["id"]=$_POST["id"];
        $data["nombre"]=ucfirst($_POST["nombre"]);
        $data["numero"] = $_POST["numero"];
        $data["id_ejemplar"] = $_POST["ejemplar"];
        $data["precio"] = $_POST["precio"];;

        $this->model->update($data);

        if(isset($_POST["seccion"])){
        $arraySeccion = $_POST["seccion"];
        $this->model->eliminarRelacion($data["id"]);

            for($i=0; $i<count($arraySeccion); $i++) {
                $this->model->insertarRelacion($data["id"], $arraySeccion[$i]);
            }
        }

        $data2["mensaje"] = "Edición editada correctamente";

        $data2["edicion"] = $this->model->obtenerEdicionPorId($data["id"]);
        $data2["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data2["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/editarEdicion.php", $data2);
    }

    public function validar(){
        if(isset($_POST["seccion"])){
            $data = array();
            $data["nombre"] = ucfirst($_POST["nombre"]);
            $data["numero"] = $_POST["numero"];
            $data["id_ejemplar"] = $_POST["ejemplar"];
            $data["precio"] = $_POST["precio"];
            $arraySeccion = $_POST["seccion"];

            $resultado = $this->validarRepeticiones($data["nombre"], $data["numero"], $data["id_ejemplar"]);

            if($resultado==true) {
                $this->model->insertar($data);
                $result = $this->model->traerIdDeEdicion();
                $IdEdicion=0;

                foreach ($result as $a){
                    foreach ($a as $b){
                        $IdEdicion=$b;
                    }
                }
                for($i=0; $i<count($arraySeccion); $i++) {
                    $this->model->insertarRelacion($IdEdicion, $arraySeccion[$i]);
                }

                $mensaje= "Edición agregada correctamente";

            }else{
                $mensaje= "Edición repetida";
            }
        }else {
            $mensaje = "Tilde al menos una sección";
        }

                $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
                $data["secciones"]=$this->modelSeccion->obtenerSecciones();
                $data["mensaje"]=$mensaje;
                echo $this->renderer->render("view/agregarEdicion.php", $data);
    }

    public function validarRepeticiones($nombre, $numero, $ejemplar){
        $resultado = $this->model->buscarEdicionEspecífica(ucfirst($nombre), $numero, $ejemplar);

        if($resultado!=null) {
            return false;
        }else {
            return true;
        }
    }
    public function listaAdmin(){
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listaEdicionesAdmin.php", $data);
    }
    public function cambiarEstado(){
        $id=$_POST["id"];
        $estado=$_POST["estado"];
        if($estado==1){
            $estado=0;
        }else{
            $estado=1;
        }
        $this->model->cambiarEstado($id,$estado);
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listaEdicionesAdmin.php", $data);
    }
}