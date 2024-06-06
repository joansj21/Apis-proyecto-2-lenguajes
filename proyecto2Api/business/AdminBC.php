<?php
require_once '..data\AdminDA.php';

class AdminBC {


    public function LoginAdmin($correo, $contrasena) {
        $adminDA = new AdminDA();
        return $adminDA->loginAdmin($correo, $contrasena);
    }

    


}
?>