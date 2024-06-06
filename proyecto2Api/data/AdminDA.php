<?php
require_once '../bd/BD.php';


class AdminDA {
 


    public function __construct() {
   
    }
    
    public function loginAdmin($correo, $contrasena) {
        try {

            $query = "CALL LoginAdmin('$correo', '$contrasena')";

           
          return metodoGet($query);
            // Si la autenticación es exitosa, devolver los datos del administrador
    
        } catch (PDOException $e) {
            // Si hay un error, devolver un mensaje de error
            return ['error' => $e->getMessage()];
        }
    }



    
}


?>