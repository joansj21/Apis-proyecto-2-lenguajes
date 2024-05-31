<?php

include '../bd/BD.php';
include '../business/CategoriasBC.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
        
        

        $categoriasBC = new CategoriasBC();
        $resultado = $categoriasBC->getAllCategorias();

        echo json_encode($resultado->fetchAll());

    header("HTTP/1.1 200 OK");
    exit();
}









header("HTTP/1.1 400 Bad Request");
?>
