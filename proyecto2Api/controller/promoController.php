<?php

include '../business/PomocionesBC.php';
require_once '../model/Promocion.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    // Parsear el cuerpo de la solicitud PUT para obtener los parámetros
    parse_str(file_get_contents("php://input"), $_PUT);

    if (isset($_PUT['id']) && isset($_PUT['activo'])) {
        $id = $_PUT['id'];
        $activo = $_PUT['activo'];
        $empresaBC = new PromocionesBC();

        try {
            $resultado = $empresaBC->updateEstado($id, $activo);

            if ($resultado) {
                header("Content-Type: application/json");
                header("HTTP/1.1 200 OK");
                echo json_encode(["data" => "Estado actualizado correctamente"]);
            } else {
                header("Content-Type: application/json");
                header("HTTP/1.1 404 Not Found");
                echo json_encode(["error" => "No se pudo actualizar el estado"]);
            }
        } catch (Exception $e) {
            header("Content-Type: application/json");
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(["error" => $e->getMessage()]);
        }
    } else {
        header("Content-Type: application/json");
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["error" => "Parámetros inválidos"]);
    }
    exit();
}

?>