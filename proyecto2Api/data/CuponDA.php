<?php
require_once '../bd/BD.php';
require_once '../model/Cupon.php';

class CuponDA {
    public function getCupons($id) {
        $query = "SELECT * FROM cupones WHERE  empresa_id=".$id;
        $params = array(':id' => $id);
        return metodoGet($query, $params);
    }

    public function getAllCupons() {
        $query = "SELECT * FROM cupones";
        return metodoGet($query);
    }


    public function insertCupon( $cupon) {

        $nombre = $cupon->nombre;
        $ubicacion = $cupon->ubicacion;
        $fecha_expira = $cupon->fecha_expira;
        $fecha_inicio = $cupon->fecha_inicio;
        $activo = $cupon->activo;
        $categoria = $cupon->categoria;
        $empresa_id = $cupon->empresa_id;
        $precio = $cupon->precio;
    
       
        $query = "INSERT INTO cupones(nombre, ubicacion, fecha_expira,fecha_inicio,activo,categoria,empresa_id,precio) VALUES ('$nombre', '$ubicacion','$fecha_expira','$fecha_inicio','$activo','$categoria', '$empresa_id','$precio')";
        $queryAutoIncrement = "SELECT MAX(id) as id FROM cupones";

        return $resultado = metodoPost($query, $queryAutoIncrement);
    }

    public function updateCupon( $cupon, $id) {

        $nombre = $cupon->nombre;
        $ubicacion = $cupon->ubicacion;
        $fecha_expira = $cupon->fecha_expira;
        $fecha_inicio = $cupon->fecha_inicio;
        $activo = $cupon->activo;
        $categoria = $cupon->categoria;
        $empresa_id = $cupon->empresa_id;
        $precio = $cupon->precio;
    
       
        $query = "UPDATE cupones SET nombre='$nombre', ubicacion='$ubicacion', fecha_expira='$fecha_expira',fecha_inicio='$fecha_inicio', activo='$activo',categoria='$categoria' ,empresa_id='$empresa_id',precio='$precio' WHERE id='$id'";
       
        return $resultado = metodoPut($query, $queryAutoIncrement);
    }

    public function activeCupon(  $id,$activo) {
       
        $query = "UPDATE cupones SET activo='$activo' WHERE id='$id'";
        return $resultado = metodoPut($query);
    }
}


?>


