
<?php
require_once(__DIR__ . "/Producto.php");

class Ropa extends Producto {
    public function getCategoria() {
        return "Ropa";
    }

    public function getDescuento() {
        return $this->precio * 0.05;
    }
}
?>
