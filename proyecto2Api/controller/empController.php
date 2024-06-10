<?php

header('Access-Control-Allow-Origin: *');

include '../bd/BD.php';
include '../business/EmpBC.php';
require_once '../model/Empresa.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['allEmpresas'])) {
        // Procesar petición
        $empresaBC = new EmpBC();
        $resultado = $empresaBC->getAllEmpresas();
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insert'])) {
        unset($_POST['METHOD']);
        // Actualizar datos de la empresa

        $id = $_GET['id']; // Obtener el ID del cuerpo de la solicitud
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        $correo=$_POST['correo'];
        
        $empresa = new Empresa($nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,true,$correo);

        $empresaBC = new EmpBC();
      
        $resultado =$empresaBC->addEmpresa( $empresa,$id);

        echo json_encode($resultado);

        header("HTTP/1.1 200 OK");
        exit();
    } 
}

header("HTTP/1.1 400 Bad Request");
?>
