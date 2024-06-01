<?php
require_once '../bd/BD.php';


class AdminDA {
 

    private $conn;

    public function __construct() {
        $this->conn = BD::crearConexion();
    }
    
    public function loginAdmin($correo, $contrasena) {
        try {
            $stmt = $this->conn->prepare("CALL LoginAdmin(:correo, :contrasena)");
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
            $stmt->execute();

            // Si la autenticación es exitosa, devolver los datos del administrador
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['id'])) {
                return $result;
            } else {
                // Si no hay datos válidos, devolver un mensaje de error
                return ['message' => 'failure'];
            }
        } catch (PDOException $e) {
            // Si hay un error, devolver un mensaje de error
            return ['error' => $e->getMessage()];
        }
    }



    
}


?>