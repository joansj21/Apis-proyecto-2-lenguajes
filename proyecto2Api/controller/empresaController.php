<?php

include '../bd/BD.php';
include '../business/EmpresaBC.php';
require_once '../model/Empresa.php';

header('Access-Control-Allow-Origin: *');


/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $query = "SELECT * FROM cupones WHERE id=" . $_GET['id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
    } else {
        $query = "SELECT * FROM cupones";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();
}*/


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
