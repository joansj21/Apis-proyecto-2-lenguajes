<?php


include '../business/ExternalCuponesBC.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $cuponBC = new ExternalCuponesBC();
        $resultado = $cuponBC->getCupons($_GET['id']);
        
        
    } else {
        $cuponBC = new ExternalCuponesBC();
        $resultado = $cuponBC->getAllCupons();
        
        
    }
    
    if ($resultado) {
        //echo json_encode($resultado);
        //echo json_encode($resultado->fetchAll());
        echo json_encode($resultado);
        
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit();
    }
}







header("HTTP/1.1 400 Bad Request");
?>