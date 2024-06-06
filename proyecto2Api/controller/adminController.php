<?php

include '../bd/BD.php';
include '../business/AdminBC.php';

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['loginAdmin'])) {
       
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
       
        

        $AdminBC = new AdminBC();
        $resultado = $AdminBC->LoginAdmin($correo);

        $admin = $resultado->fetch(PDO::FETCH_ASSOC);
        


            echo json_encode(array("message" => true, "admin" => $admin));
           
            header("HTTP/1.1 401 Unauthorized");
        }
        exit();
    } 










header("HTTP/1.1 400 Bad Request");
?>
