<?php
require_once '../bd/BD.php';
require_once '../model/Promocion.php';


class PromocionesDA {


    public function getAllPromociones($id) {

        $query = "SELECT * FROM promociones WHERE id_cupon=" . $id;
        
        return metodoGet($query);
    }


    public function updatePromociones($promocion,$id) {

        $descripcion = $promocion->descripcion;
        $fecha_inicio = $promocion->fecha_inicio;
        $fecha_expira = $promocion->fecha_expira;
    
        // Construir la consulta SQL
        $query = "UPDATE promociones SET 
                  descripcion = '$descripcion', 
                  fecha_inicio = '$fecha_inicio', 
                  fecha_expira = '$fecha_expira' 
                  WHERE id = '$id'";
    
        // Ejecutar la consulta SQL utilizando metodoPut
        
        return  metodoPut($query, $queryAutoIncrement);
    }


    public function insertPromociones($promocion,$idCupon) {

        $descripcion = $promocion->descripcion;
        $fecha_inicio = $promocion->fecha_inicio;
        $fecha_expira = $promocion->fecha_expira;
    
        
        $query = "INSERT INTO promociones (descripcion, fecha_inicio, fecha_expira,id_cupon) 
        VALUES ('$descripcion', '$fecha_inicio', '$fecha_expira','$idCupon')";
        $queryAutoIncrement = "SELECT MAX(id) as id FROM cupones";
        
        return  metodoPost($query, $queryAutoIncrement);
    }





 
}


?>


