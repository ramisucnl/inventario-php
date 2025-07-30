
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventario con Persistencia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Inventario (Desde JSON)</h1>
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
                $productos = json_decode(file_get_contents("productos.json"), true);
                foreach ($productos as $producto) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
                    echo "<td>$" . number_format($producto['precio'], 2) . "</td>";
                    echo "<td>" . htmlspecialchars($producto['categoria']) . "</td>";
                    echo "<td>$" . number_format($producto['descuento'], 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
