<?php
require_once '../bd/BD.php';


class ImagenDA {
    // Método para obtener imágenes de un cupón por id de cupón
    public function getCuponImage($idCupon) {
        $query = "SELECT * FROM imagenCupon WHERE id_cupon = {$idCupon}";
        //$params = array(':id_cupon' => $idCupon);
        return metodoGet($query);
    }

    // Método para insertar una nueva imagen para un cupón
    public function insertCuponImage($url, $idCupon) {
        try {
            // Llama a metodoPostImg() con los parámetros correctos
            return metodoPostImg($url, $idCupon);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    
    
    // Método para actualizar una imagen existente de un cupón
    public function updateCuponImage($url, $idCupon) {
        $query = "UPDATE imagenCupon SET url = {$url} WHERE id_cupon = {$idCupon}";

        //$params = array(':url' => $url, ':id_cupon' => $idCupon);
        return metodoPut($query);
    }

}


?>


