<?php
require_once '../bd/BD.php';


class CategoriasDA {
 

    public function getAllCategorias() {
        $query = "SELECT * FROM categoria";
        return $resultado = metodoGet($query);
    }


    
}


?>


