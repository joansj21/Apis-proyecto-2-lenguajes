<?php
require_once '../bd/BD.php';


class CategoriasDA {
 

    public function getAllCategorias() {
        $query = "SELECT * FROM categoria";
        return $resultado = metodoGet($query);
    }

  

    public function insertCategoria($nombre) {
       
        $query = "INSERT INTO categoria(categoria) VALUES ('$nombre')";
    $queryAutoIncrement = "SELECT MAX(id) as id FROM categoria";    
        return metodoPost($query, $queryAutoIncrement);
    }

    public function updateCategoria( $nombre, $id) {

        
      $query = "UPDATE categoria SET categoria='$nombre' WHERE id='$id'";
        
        return $resultado = metodoPut($query);
    }


    
}


?>


