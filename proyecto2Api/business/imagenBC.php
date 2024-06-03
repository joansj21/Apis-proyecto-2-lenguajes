<?php
require_once '../data/imagenDA.php';
//require_once '../model/Cupon.php';


class ImagenBC {
    public function getCuponImage($id) {
        $cuponDA = new ImagenDA();
        return $cuponDA->getCuponImage($id);
    }

   
    public function insertCuponImage( $url,$idCupon) {
        $cuponDA = new ImagenDA();
        return $cuponDA->insertCuponImage( $url,$idCupon);
    }


    public function updateCuponImage( $url,$idCupon) {
        $cuponDA = new ImagenDA();
        return $cuponDA->updateCuponImage( $url,$idCupon);
    }


}
?>