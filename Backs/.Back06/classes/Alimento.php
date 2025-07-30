
<?php
require_once(__DIR__ . "/Producto.php");

class Alimento extends Producto {
    public function getCategoria() {
        return "Alimento";
    }

    public function getDescuento() {
        return 0;
    }
}
?>
