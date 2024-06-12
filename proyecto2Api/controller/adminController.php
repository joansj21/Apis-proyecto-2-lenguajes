<?php

// Incluir los archivos necesarios
require_once '../bd/BD.php';
require_once '../business/AdminBC.php';

// Permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');
// Especificar el tipo de contenido como JSON
header('Content-Type: application/json');

// Verificar si la solicitud es de tipo POST o GET
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se está intentando realizar un login de administrador
    if (isset($_REQUEST['loginAdmin'])) {
        // Obtener los datos del formulario o de los parámetros GET en la URL
        $correo = $_REQUEST['correo'];
        $contrasena = $_REQUEST['contrasena'];

        // Instanciar la clase AdminBC para manejar las operaciones relacionadas con los administradores
        $AdminBC = new AdminBC();
        
        // Llamar al método LoginAdmin para verificar las credenciales del administrador
        $resultado = $AdminBC->LoginAdmin($correo, $contrasena);
        
        // Obtener la información del administrador si las credenciales son válidas
        $admin = $resultado->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un administrador con el correo proporcionado
        if ($admin) {
            // Enviar una respuesta JSON con el estado de éxito y la información del administrador
            echo json_encode(array("success" => true, "admin" => $admin));
            // Establecer el código de estado HTTP 200 OK
            http_response_code(200);
            // Finalizar la ejecución del script
            exit();
        } else {
            // Enviar una respuesta JSON indicando que el administrador no fue encontrado
            echo json_encode(array("success" => false, "error" => "Admin not found"));
            // Establecer el código de estado HTTP 404 Not Found
            http_response_code(404);
            // Finalizar la ejecución del script
            exit();
        }
    }
}

// Si la solicitud no incluye los parámetros necesarios, enviar una respuesta JSON con un error
// Establecer el código de estado HTTP 400 Bad Request
http_response_code(400);
echo json_encode(array("success" => false, "error" => "Invalid request"));

?>
