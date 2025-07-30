<?php
require_once 'Producto.php';

class Alimento extends Producto {
    private $fechaCaducidad;

    public function __construct($nombre, $precio, $stock, $fechaCaducidad) {
        parent::__construct($nombre, $precio, $stock);
        $this->fechaCaducidad = $fechaCaducidad;
    }

    public function mostrarInformacion() {
        echo "Alimento: $this->nombre | Caduca: $this->fechaCaducidad | Precio: $this->precio | Stock: $this->stock<br>";
    }
}
?>
