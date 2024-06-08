<?php

include '../bd/BD.php';
include '../business/EmpresaBC.php';
require_once '../model/Empresa.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['allEmpresas'])) {
        $empresaBC = new EmpresaBC();
        $resultado = $empresaBC->getAllEmpresas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        header("HTTP/1.1 200 OK");
    } else {
        header("HTTP/1.1 400 Bad Request");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
       
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
       
        

        $empresaBC = new EmpresaBC();
        $resultado = $empresaBC->login( $correo);

        $admin = $resultado->fetch(PDO::FETCH_ASSOC);
        
        if ($contraseña== $admin['contraseña']) {

            echo json_encode(array("message" => true,"idEmpresa" => $admin['id'],"claveTemporal" => $admin['clave_temporal'],
            "cedula" => $admin['cedula'] ,"direccion" => $admin['direccion'],  "fecha_creacion" => $admin['fecha_creacion'],  
            "nombre" => $admin['nombre'],"telefono" => $admin['telefono'] ));

            header("HTTP/1.1 200 OK");
        } else {
            echo json_encode(array("message" => false));
           
            header("HTTP/1.1 401 Unauthorized");
        }
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['registrar']) {
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];

        if (!$nombre || !$cedula || !$direccion || !$fecha_creacion || !$correo || !$telefono || !$contraseña) {
            echo json_encode(array("message" => "Missing fields"));
            header("HTTP/1.1 400 Bad Request");
            exit();
        }

        $empresa = new Empresa(null, $nombre, $cedula, $direccion, $fecha_creacion, $correo, $telefono, $contraseña, true, true);

        $empresaBC = new EmpresaBC();
        $resultado = $empresaBC->addEmpresa($empresa);

        if ($resultado) {
            echo json_encode(array("id" => $resultado));
            header("HTTP/1.1 200 OK");
            exit();
        } else {
            echo json_encode(array("message" => false));
            header("HTTP/1.1 401 Unauthorized");
            exit();
        }
    } else {
        echo json_encode(array("message" => false, "reason" => "registrar not set"));
        header("HTTP/1.1 400 Bad Request");
        exit();
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    if (isset($_POST['empresa'])) {
        unset($_POST['METHOD']);
        // Actualizar datos de la empresa

        $id = $_GET['id']; // Obtener el ID del cuerpo de la solicitud
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        $temporal=$_POST['temporal'];
        

        $empresa = new Empresa($nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,$temporal);

        $empresaBC = new EmpresaBC();
        
        
      
        $resultado =$empresaBC->updateEmpresa( $empresa,$id);

        
        echo json_encode($resultado);
        


        header("HTTP/1.1 200 OK");
        exit();
        } 

}



header("HTTP/1.1 400 Bad Request");
?>
