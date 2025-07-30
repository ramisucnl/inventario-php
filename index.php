
<?php
require_once __DIR__ . "/includes/conexion.php";

// Insertar o actualizar producto
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guardar"])) {
    $id = $_POST["id"] ?? null;
    $nombre = $_POST["nombre"];
    $precio = floatval($_POST["precio"]);
    $categoria = $_POST["categoria"];

    $descuento = 0;
    if ($categoria === "Electrónico") {
        $descuento = $precio * 0.10;
    } elseif ($categoria === "Ropa") {
        $descuento = $precio * 0.05;
    }

    if ($id) {
        $sql = "UPDATE productos SET nombre=?, precio=?, categoria=?, descuento=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $precio, $categoria, $descuento, $id]);
    } else {
        $sql = "INSERT INTO productos (nombre, precio, categoria, descuento) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $precio, $categoria, $descuento]);
    }

    header("Location: index.php");
    exit;
}

// Eliminar
if (isset($_POST["eliminar"])) {
    $id = $_POST["eliminar"];
    $stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
}

// Obtener producto para edición
$editando = false;
$producto_actual = ["id" => "", "nombre" => "", "precio" => "", "categoria" => ""];
if (isset($_POST["editar_id"])) {
    $editando = true;
    $id = $_POST["editar_id"];
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    $producto_actual = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Obtener todos los productos
$stmt = $conn->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventario con MySQL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Inventario (MySQL)</h1>

    <form method="POST" style="margin-bottom: 30px;">
        <input type="hidden" name="id" value="<?= htmlspecialchars($producto_actual['id']) ?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto_actual['nombre']) ?>" required><br><br>

        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" value="<?= $producto_actual['precio'] ?>" required><br><br>

        <label>Categoría:</label><br>
        <select name="categoria" required>
            <option value="">Seleccione</option>
            <option value="Electrónico" <?= $producto_actual['categoria'] === 'Electrónico' ? 'selected' : '' ?>>Electrónico</option>
            <option value="Alimento" <?= $producto_actual['categoria'] === 'Alimento' ? 'selected' : '' ?>>Alimento</option>
            <option value="Ropa" <?= $producto_actual['categoria'] === 'Ropa' ? 'selected' : '' ?>>Ropa</option>
        </select><br><br>

        <button type="submit" name="guardar"><?= $editando ? 'Actualizar' : 'Agregar' ?> Producto</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td>$<?= number_format($producto['precio'], 2) ?></td>
                <td><?= htmlspecialchars($producto['categoria']) ?></td>
                <td>$<?= number_format($producto['descuento'], 2) ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="editar_id" value="<?= $producto['id'] ?>">
                        <button type="submit">✏️</button>
                    </form>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este producto?');">
                        <input type="hidden" name="eliminar" value="<?= $producto['id'] ?>">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
