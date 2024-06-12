<?php
require_once '../bd/BD.php';


class AdminDA {
 


    public function __construct() {
   
    }
    
    public function loginAdmin($correo, $contrasena) {
        try {
            // Usar comillas simples alrededor de los valores de correo y contraseña
            $query = "SELECT * FROM administradores WHERE correo = '$correo' AND contraseña = '$contrasena'";
    
            // Ejecutar la consulta utilizando el método apropiado
            return metodoGet($query);
            // Si la autenticación es exitosa, devolver los datos del administrador
    
        } catch (PDOException $e) {
            // Si hay un error, devolver un mensaje de error
            return ['error' => $e->getMessage()];
        }
    }
    



    
}


?>