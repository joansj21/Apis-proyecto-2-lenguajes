<?php

include '../business/PomocionesBC.php';
require_once '../model/Promocion.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
      
        $promocioneBC = new PromocionesBC();
        $resultado = $promocioneBC->getAllPromociones( $id);
      
       
       
        echo json_encode($resultado->fetchAll());
    } 
    header("HTTP/1.1 200 OK");
    exit();
}


if ($_POST['METHOD'] == 'POST') {

   
  
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_expira = $_POST['fecha_expira'];
    $idCupon = $_POST['idCupon'];
 
   

    $promocion = new Promocion($descripcion,$fecha_inicio,$fecha_expira);

    $promocioneBC = new PromocionesBC();
    $resultado = $promocioneBC->insertPromociones( $promocion,$idCupon);

   
   
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();



}

if ($_POST['METHOD'] == 'PUT') {

    // unset($_POST['METHOD']);

    
     $id=$_GET['id'];
 
     $descripcion = $_POST['descripcion'];
     $fecha_inicio = $_POST['fecha_inicio'];
     $fecha_expira = $_POST['fecha_expira'];
  
    
 
     $promocion = new Promocion($descripcion,$fecha_inicio,$fecha_expira);
 
     $promocioneBC = new PromocionesBC();
     $resultado = $promocioneBC->updatePromociones($promocion, $id);
 
   
 
     echo json_encode($resultado);
     header("HTTP/1.1 200 OK");
     exit();
 }








 







header("HTTP/1.1 400 Bad Request");
?>
