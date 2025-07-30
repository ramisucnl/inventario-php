<?php
require_once 'Producto.php';
require_once __DIR__ . '/../interfaces/IDescuento.php';

class Electronico extends Producto implements IDescuento {
    private $marca;

    public function __construct($nombre, $precio, $stock, $marca) {
        parent::__construct($nombre, $precio, $stock);
        $this->marca = $marca;
    }

    public function mostrarInformacion() {
        echo "Electrónico: $this->nombre | Marca: $this->marca | Precio: $this->precio | Stock: $this->stock<br>";
    }

    public function aplicarDescuento($porcentaje) {
        $this->precio -= ($this->precio * ($porcentaje / 100));
    }
}
?>
