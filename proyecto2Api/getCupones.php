<?php

include 'bd/BD.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Obtener un cupon por su id
        $query = "SELECT * FROM cupones WHERE id=" . $_GET['id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
    } else {
        // Obtener cupones activos cuya fecha_expira es mayor o igual a la fecha actual
        $currentDate = date('Y-m-d');
        $query = "SELECT * FROM cupones WHERE activo = 0 AND fecha_expira >= '$currentDate'";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    } 
    header("HTTP/1.1 200 OK");
    exit();
}





/*
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Obtener un cupon por su id
        $query = "SELECT * FROM cupones WHERE id=" . $_GET['id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
    } elseif (isset($_GET['empresa_id'])) {
        // Obtener todos los cupones de una empresa
        $query = "SELECT * FROM cupones WHERE empresa_id=" . $_GET['empresa_id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    } elseif (isset($_GET['active_coupons'])) {
        // Obtener cupones activos cuya fecha_expira es mayor o igual a la fecha actual
        $currentDate = date('Y-m-d');
        $query = "SELECT * FROM cupones WHERE activo = 0 AND fecha_expira >= '$currentDate'";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    } else {
        // Obtener todos los cupones
        $query = "SELECT * FROM cupones";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();
}




*/



header("HTTP/1.1 400 Bad Request");
?>