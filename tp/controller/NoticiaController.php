<?php

class NoticiaController
{
    private $renderer;
    private $model;
    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }
    public function index(){
        $ejemplares["sesion"]=$this->model->obtenerEjemplares();
        echo $this->renderer->render("view/elegirEjemplar.php",$ejemplares);
    }

    public function mostrarEdiciones(){
        $id=$_POST["ejemplar"];
        $resultados["sesion"]=$this->model->obtenerEdiciones($id);
        echo $this->renderer->render("view/elegirEdicion.php",$resultados);
    }

    public function mostrarSecciones(){
        $id=$_POST["edicion"];
        $resultados["sesion"]=$this->model->obtenerSeccionesPorEdicion($id);
        echo $this->renderer->render("view/elegirSeccion.php",$resultados);
    }

    public function crearSeccion(){
        $data['id']=$_POST['seccion'];
        echo $this->renderer->render("view/agregarNoticia.php",$data);
    }

    public function validar(){
        $data = array();
        $data["video"]=$_POST["video"];
        $data["link"]=$_POST["link"];
        $data["ubicacion"]=$_POST["ubicacion"];
        $data["contenido"]=$_POST["contenido"];
        $data["subtitulo"]=$_POST["subtitulo"];
        $data["titulo"]=$_POST["titulo"];
        $data["id_seccion"]=$_POST["seccion"];
        $data["id_usuario"]='';

        foreach ($_SESSION['id'] as $id){
            foreach ($id as $valor){
                $data["id_usuario"]=$valor;
            }
        }

       $bol=$this->model->insertar($data);

        if($bol!=false){
            $data["id"]=$this->model->ultimoId();

            echo $this->renderer->render("view/noticiaPreview.php", $data);
        }else{
            echo "error";
        }
    }

    public function guardarImagen(){
            $arch = $_FILES['file']['name'];
            if (isset($arch) && $arch != "") {
                $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!(strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000)) {
                    echo "<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>";
                }
                else {
                    if (move_uploaded_file($temp, 'images/'.$arch)) {
                        $this->model->guardarImagen('images/$arch',$_POST['id']);
                        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';

                        echo "<p><img src='images/$arch'></p>";
                    }
                    else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            }
        }

}