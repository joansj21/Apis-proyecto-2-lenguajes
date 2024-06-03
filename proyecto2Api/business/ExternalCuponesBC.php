<?php
require_once '../data/ExternalCuponesDA.php';

class ExternalCuponesBC {
    public function getCupons($id) {
        $cuponDA = new ExternalCuponesDA();
        return $cuponDA->getCupons($id);
    }

    public function getAllCupons() {
        $cuponDA = new ExternalCuponesDA();
        return $cuponDA->getAllCupons();
    }


    
}
?>