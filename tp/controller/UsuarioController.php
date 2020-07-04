<?php


class UsuarioController
{
    private $renderer;
    private $model;
    private $pdf;

    public function __construct($model,$renderer,$pdf){
        $this->renderer = $renderer;
        $this->model = $model;
        $this->pdf=$pdf;
    }
   
    public function generarResumenDeSuscripciones(){
        if(isset($_SESSION['name'])){
            $name=$_SESSION['name'];
            $result=$this->model->obtenerSuscripciones($_SESSION['name']);
            if($result){
                $da=array();
            $nombre=$result[0]["nombre"];
            $telefono=$result[0]["telefono"];
    
            $this->pdf->AddPage();
            $this->pdf->SetFont('Arial','B',12);
    
            $this->pdf->SetFillColor(200,220,255);
            $this->pdf->Cell(0,6,"RESUMEN DE SUSCRIPCIONES | InfoNete | $nombre",0,1,'L',true);
            $this->pdf->ln();
    
            $this->pdf->SetFont('Arial','',13);
            $this->pdf->Cell(50,10,"Nombre: ".$nombre." | Telefono: ".$telefono,0,1,"L");
    
            $this->pdf->ln();
    
            $this->pdf->SetFont('Arial','B',16);
            $this->pdf->SetFillColor(200,220,255);
            $this->pdf->Cell(0,6,"Resumen de tus suscripciones en los siguientes ejemplares: ",0,1,'L',true);
            $this->pdf->ln();
            $this->pdf->SetFont('Arial','',13);
    
            foreach ($result as $v){
                $this->pdf->Cell(40,10,"Ejemplar: ".$v["ejemplar"]);
                $this->pdf->ln();
                $this->pdf->Cell(40,10,"Fecha de suscripcion: ".$v["fecha"]);
                $this->pdf->ln();
                $this->pdf->Cell(40,10,"Precio: ".$v["precio"],0,1);
                $this->pdf->ln();
            }
            $this->pdf->SetY(250);
            $this->pdf->SetFont('Arial','I',10);
            $this->pdf->Cell(0,10,'Gracias por confiar en Infonete',0,0,'C');
    
            $this->pdf->Output(); 
            }
            echo "no tiene resumenes";
        
        }else{
            $this->index();
        }       
    }

    public function generarResumenDeCompras(){
        if(isset($_SESSION['name'])){
            $name=$_SESSION['name'];
            $result=$this->model->obtenerCompras($_SESSION['name']);
            if($result){
            $da=array();
            $nombre=$result[0]["nombre"];
    
            $this->pdf->AddPage();
            $this->pdf->SetFont('Arial','B',12);
    
            $this->pdf->SetFillColor(200,220,255);
            $this->pdf->Cell(0,6,"RESUMEN DE COMPRAS | InfoNete | $nombre",0,1,'L',true);
            $this->pdf->ln();
    
            $this->pdf->SetFont('Arial','',13);
            $this->pdf->Cell(50,10,"Nombre de usuario: ".$nombre,0,1,"L");
    
            $this->pdf->ln();
    
            $this->pdf->SetFont('Arial','B',16);
            $this->pdf->SetFillColor(200,220,255);
            $this->pdf->Cell(0,6,"Resumen de tus compras en las siguientes ediciones: ",0,1,'L',true);
            $this->pdf->ln();
            $this->pdf->SetFont('Arial','',13);
    
            foreach ($result as $v){
                $this->pdf->Cell(40,10,"Ejemplar: ".$v["ejemplar"]);
                $this->pdf->ln();
                $this->pdf->Cell(40,10,"Edicion: ".$v["edicion"]);
                $this->pdf->ln();
                $this->pdf->Cell(40,10,"Numero de edicion: ".$v["numero"]);
                $this->pdf->ln();
                $this->pdf->Cell(40,10,"Precio: ".$v["precio"],0,1);
                $this->pdf->ln();
            }
            $this->pdf->SetY(250);
            $this->pdf->SetFont('Arial','I',10);
            $this->pdf->Cell(0,10,'Gracias por confiar en Infonete',0,0,'C');
    
            $this->pdf->Output(); 
            }
            echo "no tiene resumenes";
        
        }else{
            $this->index();
        }    
    }


    public function registro(){
        echo $this->renderer->render( "view/regisroView.php");
    }

    public function registroDelAdmin(){
        $roles["sesion"]=$this->model->obtenerRoles();

        echo $this->renderer->render( "view/registroAdmin.php",$roles);
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
        $data["rol"]="";
        $flag=false;

        if(!isset($_POST["rol"])){
            $data["rol"]=1;
        }else{
            $data["rol"]=$_POST["rol"];
            $flag=true;
        }
       $error=array();
        try {
            $this->validar($_POST["email"],$_POST["usuario"],$_POST["password"],$_POST["password2"]);
            $data["password"]=$_POST["password"];
            $data["email"]=$_POST["email"];
            $data["usuario"]=$_POST["usuario"];
            $this->guardar($data,$flag);
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
                $id=$this->model->obtenerId($name);
                $_SESSION['id']=$id;
                $sesion["sesion"]=$_SESSION;

                foreach($data["user"] as $producto => $detalles){
                    if($detalles["id_rol"]==2){
                        echo $this->renderer->render("view/vistaAdmin.php",$sesion);
                    }elseif($detalles["id_rol"]==1){
                        echo $this->renderer->render( "view/registrado.php",$sesion );
                    }else{
                        echo $this->renderer->render( "view/internoConte.php",$sesion );
                    }
                }

            }else{
                echo $this->renderer->render( "view/loginUsuario.php");
            }
        }else{

            $name= $_SESSION['name'];
            $pass= $_SESSION['pass'];
            $data["user"]=$this->model->logear($name,$pass);
            $sesion["sesion"]=$_SESSION;

            foreach($data["user"] as $producto => $detalles){
                if($detalles["id_rol"]==2){
                    echo $this->renderer->render("view/vistaAdmin.php",$sesion);
                }elseif($detalles["id_rol"]==1){
                    echo $this->renderer->render( "view/registrado.php",$sesion );
                }elseif($detalles["id_rol"]==3){
                    echo $this->renderer->render( "view/internoConte.php",$sesion );
                }else{
                    echo $this->renderer->render( "view/loginUsuario.php");
                }
            }
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

    public function guardar($data,$flag){
        $this->model->insertar($data);
        if($flag){
           echo $this->renderer->render("view/vistaAdmin.php");
        }else{
            $this->index();
        }

    }

    public function mostrar(){
        $data["users"] = $this->model->obtenerUsuarios();
        echo $this->renderer->render( "view/presentacionesView.php", $data);
    }

    //probably temporal
    public function contenidista(){
        echo $this->renderer->render( "view/internoConte.php");
    }

    public function editarRol(){
        $data["usuarios"]=$this->model->mostrarUsuariosYRolPorId();
        $data["roles"]=$this->model->obtenerRoles();
        echo $this->renderer->render("view/editarRolUsuario.php",$data);
    }

    public function actualizarRol(){
        $rol=$_POST['rol'];
        $usuario=$_POST["usuario"];
        $this->model->updateRol($rol,$usuario);
        echo $this->editarRol();
    }

    public function mostrarContenidistas(){
        if(isset($_SESSION['name'])){
            $result=$this->model->mostrarContenidistas();
            if($result) {
                $this->pdf->AddPage();
                $this->pdf->SetFont('Arial', 'B', 12);

                $this->pdf->SetFillColor(200, 220, 255);
                $this->pdf->Cell(0, 6, "INFORMACION DE CONTENIDISTAS | InfoNete ", 0, 1, 'L', true);
                $this->pdf->ln();
                $this->pdf->SetFont('Arial', '', 13);
                foreach ($result as $v) {
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Nombre: " . $v["nombre"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Nombre de usuario: " . $v["nombre_usuario"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Fecha de nacimiento: " . $v["fecha_nacimiento"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Email: " . $v["email"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Telefono: " . $v["telefono"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Ubicacion: " . $v["ubicacion"]);
                    $this->pdf->ln();
                }
                $this->pdf->Output();

            }

        }
    }
    public function mostrarClientesYProductos(){
        if(isset($_SESSION['name'])){
            $result=$this->model->mostrarClientesYProductos();
            if($result){
                $this->pdf->AddPage();
                $this->pdf->SetFont('Arial', 'B', 12);

                $this->pdf->SetFillColor(200, 220, 255);
                $this->pdf->Cell(0, 6, "INFORMACION DE CLIENTES CON PRODUCTOS ADQUIRIDOS | InfoNete ", 0, 1, 'L', true);
                $this->pdf->ln();
                $this->pdf->SetFont('Arial', '', 13);
                foreach ($result as $v) {
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Nombre: " . $v["usuario"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Edicion: " . $v["nombre_edicion"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Edicion numero: " . $v["edicion"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Ejemplar: " . $v["ejemplar"]);
                    $this->pdf->ln();
                }
                $this->pdf->Output();
            }else{
                echo "no hay resultados que mostrar";
            }
        }else{
            echo $this->index();
        }
    }
    public function suscripcionesDeProducto(){
        if(isset($_SESSION['name'])){
            $result=$this->model->suscripcionesDeProducto();
            if($result){
                $this->pdf->AddPage();
                $this->pdf->SetFont('Arial', 'B', 12);

                $this->pdf->SetFillColor(200, 220, 255);
                $this->pdf->Cell(0, 6, "SUSCRIPCIONES DE PRODUCTOS | InfoNete ", 0, 1, 'L', true);
                $this->pdf->ln();
                $this->pdf->SetFont('Arial', '', 13);
                foreach ($result as $v) {
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Ejemplar: " . $v["ejemplar"]);
                    $this->pdf->ln();
                    $this->pdf->Cell(40, 10, "Suscripciones totales: " . $v["total"]);
                    $this->pdf->ln();
                    $compra=$this->model->comprasProducto($v["id"]);
                    if($compra){
                        $totalCompra=$compra[0]["compras"];
                    }else{
                        $totalCompra=0;
                    }

                    $this->pdf->Cell(40, 10, "Compras totales: " .$totalCompra);
                    $this->pdf->ln();
                }
                $this->pdf->Output();
            }else{
                echo "no hay resultados que mostrar";
            }
        }else{
            echo $this->index();
        }


    }
    public function generarPdfs(){
        echo $this->renderer->render("view/generarPdf.php");
    }
    public function listaAdmin(){
       echo $this->renderer->render("view/listadoAdmin.php");
    }
    public function estadisticasAdmin(){
        echo $this->renderer->render("view/estadisticasAdmin.php");
    }
    public function listaConte(){
        echo $this->renderer->render("view/listadoConte.php");
    }
}