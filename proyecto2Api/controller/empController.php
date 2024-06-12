<?php

include '../bd/BD.php';
include '../business/empBC.php';
require_once '../model/Empresa.php';

header('Access-Control-Allow-Origin: *');


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


        $empresa = new Empresa($nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,$temporal,"");

        $empresaBC = new EmpresaBC();



        $resultado =$empresaBC->updateEmpresa( $empresa,$id);


        echo json_encode($resultado);



        header("HTTP/1.1 200 OK");
        exit();
        } 

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['insert'])) {
        unset($_POST['METHOD']);
        // Actualizar datos de la empresa

        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        $correo = $_POST['correo'];


        $empresa = new Empresa($nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,true,$correo);

        $empresaBC = new empBC();



        $resultado =$empresaBC->insertEmpresa( $empresa);


        echo json_encode($resultado);



        header("HTTP/1.1 200 OK");
        exit();
        } 

}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['allEmpresas'])) {
        $empresaBC = new empBC();
        $resultado = $empresaBC->getAllEmpresas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        header("HTTP/1.1 200 OK");
    } else {
        header("HTTP/1.1 400 Bad Request");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $activo = $_GET['activo'];
        $empresaBC = new empBC();
        $resultado = $empresaBC->updateEstado($id, $activo);
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
        header("HTTP/1.1 200 OK");
    } else {
        header("HTTP/1.1 400 Bad Request");
    }
    exit();
}


header("HTTP/1.1 400 Bad Request");
?>