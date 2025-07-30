<?php
require_once 'clases/Electronico.php';
require_once 'clases/Alimento.php';
require_once 'clases/Ropa.php';

$productos = [];

$productos[] = new Electronico("Laptop", 1500, 10, "Dell");
$productos[] = new Alimento("Pan", 1.5, 100, "2025-08-10");
$productos[] = new Ropa("Camiseta", 20, 50, "M");

// Aplicamos polimorfismo
foreach ($productos as $producto) {
    $producto->mostrarInformacion();

    if ($producto instanceof IDescuento) {
        $producto->aplicarDescuento(10);
        echo "Después de descuento: " . $producto->getPrecio() . "<br>";
    }

    echo "<hr>";
}
?>
