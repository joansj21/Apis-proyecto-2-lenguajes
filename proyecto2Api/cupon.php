<?php

include 'bd/BD.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $query = "SELECT * FROM cupones WHERE empresa_id=" . $_GET['id'];
        $resultado = metodoGet($query);
       // echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
        echo json_encode($resultado->fetchAll());
    } else {
        $query = "SELECT * FROM cupones";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();
}



if ($_POST['METHOD'] == 'POST') {

   // if (isset($_POST['insert'])) {
  
        unset($_POST['METHOD']);
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $activo = $_POST['activo'];
        $fecha_expira = $_POST['fecha_expira'];

        $empresa_id = $_POST['empresa_id']; // Añadir empresa_id en los datos enviados desde el frontend
        $query = "INSERT INTO cupones(nombre, descripcion, fecha_expira,activo,empresa_id) VALUES ('$nombre', '$descripcion','$fecha_expira', '$activo', '$empresa_id')";
        $queryAutoIncrement = "SELECT MAX(id) as id FROM cupones";
        $resultado = metodoPost($query, $queryAutoIncrement);
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
   // }

    
}


if ($_POST['METHOD'] == 'PUT') {

         unset($_POST['METHOD']);

         $id=$_GET['id'];
         $nombre = $_POST['nombre'];
         $descripcion = $_POST['descripcion'];
         $activo = $_POST['activo'];
         $fecha_expira = $_POST['fecha_expira'];
         $empresa_id = $_POST['empresa_id'];
         $query = "UPDATE cupones SET nombre='$nombre', descripcion='$descripcion', fecha_expira='$fecha_expira', activo='$activo', empresa_id='$empresa_id' WHERE id='$id'";
         $resultado = metodoPut($query, $queryAutoIncrement);
         echo json_encode($resultado);
         header("HTTP/1.1 200 OK");
         exit();
    
 
     
 }
 



if($_POST['METHOD']=='DELETE'){
    unset($_POST['METHOD']);
    $id = $_GET['id'];
    $activo = $_POST['activo'];
    //$query = "UPDATE SET activo='1' cupones WHERE id='$id'";
    $query = "UPDATE cupones SET activo='$activo' WHERE id='$id'";
    $resultado = metodoPut($query);
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();
}




header("HTTP/1.1 400 Bad Request");
?>
