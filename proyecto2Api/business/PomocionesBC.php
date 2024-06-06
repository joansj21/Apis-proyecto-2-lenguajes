<?php
require_once '../data/PromocionesDA.php';
require_once '../model/Promocion.php';

class PromocionesBC {

    public function getAllPromociones($id) {
        $promocionesDA = new PromocionesDA();
        return $promocionesDA->getAllPromociones($id);
    }


    public function updatePromociones($promocion,$id) {
        $promocionesDA = new PromocionesDA();
        return $promocionesDA->updatePromociones($promocion,$id);
    }

    public function insertPromociones($promocion,$idCupon) {

        $promocionesDA = new PromocionesDA();
        return $promocionesDA->insertPromociones($promocion,$idCupon);


    }




   


}
?>