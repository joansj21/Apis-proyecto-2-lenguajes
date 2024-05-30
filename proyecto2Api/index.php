<?php

include 'bd/BD.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $query = "SELECT * FROM empresas WHERE correo='$correo'";
        $resultado = metodoGet($query);
        $admin = $resultado->fetch(PDO::FETCH_ASSOC);
        
        if ($contraseña== $admin['contraseña']) {

            echo json_encode(array("message" => true,"idEmpresa" => $admin['id'],"claveTemporal" => $admin['clave_temporal']));
            header("HTTP/1.1 200 OK");
        } else {
            echo json_encode(array("message" => false));
           //echo json_encode(array("base" => $admin['contraseña']));
           //echo json_encode(array("enviada" => $admin['contraseña']));
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
        
        $query = "UPDATE empresas SET cedula='$cedula', direccion='$direccion', fecha_creacion='$fecha_creacion', clave_temporal='$temporal',nombre='$nombre', telefono='$telefono', contraseña='$contraseña' WHERE id='$id'";
        
        // Ejecutar la consulta y enviar la respuesta
        $resultado = metodoPut($query);
        echo json_encode($resultado);
        


        header("HTTP/1.1 200 OK");
        exit();
        } 

    // Verificar si se está actualizando datos de cupón
    /*elseif (isset($_PUT['cupon'])) {
        // Actualizar datos del cupón
        $id = $_PUT['id']; // Obtener el ID del cuerpo de la solicitud
        $nombre = $_PUT['nombre'];
        $descripcion = $_PUT['descripcion'];
        $activo = $_PUT['activo'];
        
        $query = "UPDATE cupones SET nombre='$nombre', descripcion='$descripcion', activo='$activo' WHERE id='$id'";
        
        // Ejecutar la consulta y enviar la respuesta
        $resultado = metodoPut($query);
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        // Si no se especifica una entidad válida en el cuerpo de la solicitud
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("message" => "Invalid entity"));
        exit();
    }*/
}



header("HTTP/1.1 400 Bad Request");
?>
