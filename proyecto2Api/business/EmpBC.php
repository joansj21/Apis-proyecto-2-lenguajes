<?php
require_once '../data/EmpDA.php';
require_once '../model/Empresa.php';
include '../business/validation/validationEmpresa.php';

class EmpBC {

   

    public function addEmpresa($empresa) {
       // Validar los campos
    $mensajeError = validarCampos($empresa);

    // Si hay un mensaje de error, devolverlo
    if ($mensajeError !== "") {
        return ['error' => $mensajeError];
    }

    // Si no hay errores, proceder con la actualización
    $empresaDA = new EmpDA();
    return $empresaDA->updateEmpresa($empresa, $id);


    }


   public function getAllEmpresas() {
        $empresaDA = new EmpDA();
        return $empresaDA->getAllEmpresas();
    }

}
?>