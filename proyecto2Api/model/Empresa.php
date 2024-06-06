<?php
class Empresa {
    public $id;
    public $nombre;
    public $cedula;
    public $direccion;
    public $fecha_creacion;
    public $telefono;
    public $contraseña;
    public $temporal;


    public function __construct($id, $nombre, $cedula, $direccion, $fecha_creacion, $telefono, $contraseña, $temporal) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->direccion = $direccion;
        $this->fecha_creacion = $fecha_creacion;
        $this->telefono = $telefono;
        $this->contraseña = $contraseña;
        $this->temporal = $temporal;
    }

   

    // Constructor para inicializar las propiedades


}
?>
