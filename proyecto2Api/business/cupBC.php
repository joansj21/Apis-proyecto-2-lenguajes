
<?php
require_once '../data/cupDA.php';

class cupBC {

    public function updateEstado($id, $activo)
    {
        $empresaDA = new cupDA();
        return $empresaDA->updateEstado($id, $activo);
    }

}
?>