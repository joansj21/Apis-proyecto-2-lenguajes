<?php
class Cupon {
    public $nombre;
    public $ubicacion;
    public $activo;
    public $categoria;
    public $fecha_expira;
    public $fecha_inicio;
    public $empresa_id;
    public $precio;

    // Constructor para inicializar las propiedades
    public function __construct($nombre, $ubicacion, $activo, $categoria, $fecha_expira, $fecha_inicio, $empresa_id,$precio) {
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->activo = $activo;
        $this->categoria = $categoria;
        $this->fecha_expira = $fecha_expira;
        $this->fecha_inicio = $fecha_inicio;
        $this->empresa_id = $empresa_id;
        $this->precio = $precio;
    }

}
?>
