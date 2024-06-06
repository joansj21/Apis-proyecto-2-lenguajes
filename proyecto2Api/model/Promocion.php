<?php
class Promocion{

    public $descripcion;
    public $fecha_inicio;
    public $fecha_expira;
   


    public function __construct($descripcion, $fecha_inicio, $fecha_expira) {
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_expira = $fecha_expira;
    
    }

   



}
?>
