<?php

include '../bd/BD.php';
include '../business/empBC.php';
require_once '../model/Empresa.php';

// Habilitar CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['update'])) {
        unset($_POST['METHOD']);
        // Actualizar datos de la empresa
        $id = $_POST['id'];
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        $correo = $_POST['correo'];
 
        

        $empresa = new Empresa($nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,true,$correo);

        $empresaBC = new empBC();



        $resultado =$empresaBC->updateEmpresa($id,$nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,$correo);


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
    // Parsear el cuerpo de la solicitud PUT para obtener los parámetros
    parse_str(file_get_contents("php://input"), $_PUT);

    if (isset($_PUT['id']) && isset($_PUT['activo'])) {
        $id = $_PUT['id'];
        $activo = $_PUT['activo'];
        $empresaBC = new empBC();

        try {
            $resultado = $empresaBC->updateEstado($id, $activo);

            if ($resultado) {
                header("Content-Type: application/json");
                header("HTTP/1.1 200 OK");
                echo json_encode(["message" => "Estado actualizado correctamente"]);
            } else {
                header("Content-Type: application/json");
                header("HTTP/1.1 404 Not Found");
                echo json_encode(["error" => "No se pudo actualizar el estado"]);
            }
        } catch (Exception $e) {
            header("Content-Type: application/json");
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(["error" => $e->getMessage()]);
        }
    } else {
        header("Content-Type: application/json");
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["error" => "Parámetros inválidos"]);
    }
    exit();
}







header("HTTP/1.1 400 Bad Request");
?>