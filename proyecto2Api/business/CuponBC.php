<?php
require_once '../data/CuponDA.php';
require_once '../model/Cupon.php';

class CuponBC {
    public function getCupons($id) {
        $cuponDA = new CuponDA();
        return $cuponDA->getCupons($id);
    }

    public function getAllCupons() {
        $cuponDA = new CuponDA();
        return $cuponDA->getAllCupons();
    }


    public function insertCupon( $cupon) {
        $cuponDA = new CuponDA();
        return $cuponDA->insertCupon( $cupon);
    }


    public function updateCupon( $cupon, $id) {
        $cuponDA = new CuponDA();
        return $cuponDA->updateCupon( $cupon, $id);
    }

    public function activeCupon( $id,$activo) {
        $cuponDA = new CuponDA();
        return $cuponDA->activeCupon( $id,$activo);
    }
}
?>