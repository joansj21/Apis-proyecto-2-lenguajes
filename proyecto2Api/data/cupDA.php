<?php
require_once '../bd/BD.php';


class cupDA {



    public function updateEstado($id, $activo) {
        if ($activo == 1) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $query = "UPDATE cupones SET activo='$activo' WHERE id='$id'";
        return metodoPut($query);
    }


 
}


?>


