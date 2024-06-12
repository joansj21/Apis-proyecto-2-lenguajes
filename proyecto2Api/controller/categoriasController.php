<?php

include '../bd/BD.php';
include '../business/CategoriasBC.php';

// headers CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

// Si la solicitud es OPTIONS, responder con 200 OK y salir
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    

        $categoriasBC = new CategoriasBC();
        $resultado = $categoriasBC->getAllCategorias();
        echo json_encode($resultado->fetchAll());

    header("HTTP/1.1 200 OK");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['insert'])) {
        unset($_POST['METHOD']);
        $nombre = $_POST['nombre'];
        $categoriasBC = new CategoriasBC();
        $resultado = $categoriasBC->insertCategoria($nombre);
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
    }
}
// Manejo de solicitud PUT
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener el cuerpo de la solicitud
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar y procesar los datos
    if (isset($data['id']) && isset($data['nombre'])) {
        $id = $data['id'];
        $nombre = $data['nombre'];
        
        // Actualizar la categoría en la base de datos
        $categoriasBC = new CategoriasBC();
        $resultado = $categoriasBC->updateCategoria($nombre, $id);

        // Responder con el resultado
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        // Si faltan datos requeridos
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['error' => 'Missing id or nombre in request']);
        exit();
    }
}

// Si se llega aquí, significa que el método HTTP no es soportado
header("HTTP/1.1 405 Method Not Allowed");
echo json_encode(['error' => 'Method Not Allowed']);
exit();




?>
