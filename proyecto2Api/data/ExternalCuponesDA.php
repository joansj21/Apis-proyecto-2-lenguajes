<?php
require_once '../bd/BD.php';
require_once '../model/Cupon.php';

class ExternalCuponesDA {
    public function getCupons($id) {
     /*   $query = "SELECT * FROM cupones WHERE  empresa_id=".$id;
       
        return metodoGet($query, $params);*/

        $query = "CALL GetCuponWithPromotions(".$id.")";
        return metodoGetProcedure($query);
    }

    public function getAllCupons() {
        $query = "CALL GetAllCuponsWithPromotions()";
        return metodoGetProcedure($query);
    }



}


?>


