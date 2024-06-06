<?php

include '../bd/BD.php';
include '../business/imagenBC.php';


header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {

        $imagenBC = new ImagenBC();
        $resultado = $imagenBC->getCuponImage($_GET['id']);
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
        $url = $_POST['url'];
        $id = $_POST['id'];

        $imagenBC = new ImagenBC();
        $resultado = $imagenBC->insertCuponImage( $url,$id);

       
       
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
        
   

    
}


if ($_POST['METHOD'] == 'PUT') {

    unset($_POST['METHOD']);
    $url = $_POST['url'];

    $imagenBC = new ImagenBC();
    $resultado = $imagenBC->updateCuponImage($_GET['id'],$url);

 
       
   
         echo json_encode($resultado);
         header("HTTP/1.1 200 OK");
         exit();
    
 
     
 }
 







header("HTTP/1.1 400 Bad Request");
?>
