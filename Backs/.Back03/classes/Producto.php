<?php
abstract class Producto {
    protected $nombre;
    protected $precio;
    protected $stock;

    public function __construct($nombre, $precio, $stock) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    abstract public function mostrarInformacion();

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function actualizarStock($cantidad) {
        $this->stock += $cantidad;
    }
}
?>
