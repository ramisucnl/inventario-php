
<?php
require_once __DIR__ . "/classes/Electronico.php";
require_once __DIR__ . "/classes/Alimento.php";
require_once __DIR__ . "/classes/Ropa.php";
require_once __DIR__ . "/classes/Producto.php";
require_once __DIR__ . "/classes/IDescuento.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Inventario de Productos</h1>
        <div class="button-group">
            <button>Nuevo</button>
            <button>Modificar</button>
            <button>Eliminar</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Descuento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Aquí puedes generar productos aleatorios como ya tenías en tu lógica original
                for ($i = 1; $i <= 50; $i++) {
                    $tipo = rand(1, 3);
                    switch ($tipo) {
                        case 1:
                            $producto = new Electronico("Electrónico $i", rand(1000, 5000));
                            break;
                        case 2:
                            $producto = new Alimento("Alimento $i", rand(10, 100));
                            break;
                        case 3:
                            $producto = new Ropa("Ropa $i", rand(200, 1000));
                            break;
                    }
                    echo "<tr>";
                    echo "<td>" . $producto->getNombre() . "</td>";
                    echo "<td>$" . number_format($producto->getPrecio(), 2) . "</td>";
                    echo "<td>" . $producto->getCategoria() . "</td>";
                    echo "<td>$" . number_format($producto->getDescuento(), 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
