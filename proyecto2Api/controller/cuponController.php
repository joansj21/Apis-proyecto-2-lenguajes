<?php

include '../bd/BD.php';
include '../business/CuponBC.php';
require_once '../model/Cupon.php';

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $cuponBC = new CuponBC();
        $resultado = $cuponBC->getCupons($_GET['id']);
    } else {
        $cuponBC = new CuponBC();
        $resultado = $cuponBC->getAllCupons();
    }
    
    if ($resultado) {
        //echo json_encode($resultado);
        echo json_encode($resultado->fetchAll());
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit();
    }
}




if ($_POST['METHOD'] == 'POST') {

   
  
        unset($_POST['METHOD']);
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $activo = $_POST['activo'];
        $categoria = $_POST['categoria'];
        $fecha_expira = $_POST['fecha_expira'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $empresa_id = $_POST['empresa_id']; // Añadir empresa_id en los datos enviados desde el frontend

        $cupon = new Cupon($nombre, $ubicacion, $activo, $categoria, $fecha_expira, $fecha_inicio, $empresa_id);

        $cuponBC = new CuponBC();
        $resultado = $cuponBC->insertCupon( $cupon);

       
       
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
   

    
}


if ($_POST['METHOD'] == 'PUT') {

         unset($_POST['METHOD']);

         $id=$_GET['id'];

         $nombre = $_POST['nombre'];
         $ubicacion = $_POST['ubicacion'];
         $activo = $_POST['activo'];
         $fecha_expira = $_POST['fecha_expira'];
         $fecha_inicio = $_POST['fecha_inicio'];
         $empresa_id = $_POST['empresa_id'];
         $categoria = $_POST['categoria'];
        

         $cupon = new Cupon($nombre, $ubicacion, $activo, $categoria, $fecha_expira, $fecha_inicio, $empresa_id);

         $cuponBC = new CuponBC();
         $resultado = $cuponBC->updateCupon( $cupon, $id);
 
       
   
         echo json_encode($resultado);
         header("HTTP/1.1 200 OK");
         exit();
    
 
     
 }
 



if($_POST['METHOD']=='DELETE'){
    unset($_POST['METHOD']);
    $id = $_GET['id'];
    $activo = $_POST['activo'];

    $cuponBC = new CuponBC();
    $resultado = $cuponBC->activeCupon($id,$activo);
    
    

    
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();
}




header("HTTP/1.1 400 Bad Request");
?>
