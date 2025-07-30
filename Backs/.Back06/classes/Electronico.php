
<?php
require_once(__DIR__ . "/IDescuento.php");
require_once(__DIR__ . "/Producto.php");

class Electronico extends Producto implements IDescuento {
    public function getCategoria() {
        return "Electrónico";
    }

    public function getDescuento() {
        return $this->precio * 0.10;
    }
}
?>
