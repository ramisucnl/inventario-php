<?php
require_once 'Producto.php';

class Ropa extends Producto {
    private $talla;

    public function __construct($nombre, $precio, $stock, $talla) {
        parent::__construct($nombre, $precio, $stock);
        $this->talla = $talla;
    }

    public function mostrarInformacion() {
        echo "Ropa: $this->nombre | Talla: $this->talla | Precio: $this->precio | Stock: $this->stock<br>";
    }
}
?>
