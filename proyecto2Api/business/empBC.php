<?php
require_once '../data/empDA.php';
require_once '../model/Empresa.php';
include '../business/validation/validationEmpresa.php';

class empBC {


    public function updateEmpresa($empresa, $id) {
       // Validar los campos
    $mensajeError = validarCampos($empresa);

    // Si hay un mensaje de error, devolverlo
    if ($mensajeError !== "") {
        return ['error' => $mensajeError];
    }

    // Si no hay errores, proceder con la actualización
    $empresaDA = new empDA();
    return $empresaDA->updateEmpresa($empresa, $id);


    }


    public function insertEmpresa($empresa) {
        // Validar los campos
     $mensajeError = validarCamposInsert($empresa);
 
     // Si hay un mensaje de error, devolverlo
     if ($mensajeError !== "") {
         return ['error' => $mensajeError];
     }
 
     // Si no hay errores, proceder con la actualización
     $empresaDA = new empDA();
     return $empresaDA->insertEmpresa($empresa);
 
 
     }
     public function getAllEmpresas() {
        $empresaDA = new empDA();
        return $empresaDA->getAllmpresas();
    }



}
?>