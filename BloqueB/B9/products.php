<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <li>
            Producto 1 - $10
            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="producto" value="Producto 1">
                <input type="hidden" name="precio" value="10">
                <button type="submit">Añadir al carrito</button>
            </form>
        </li>
        <li>
            Producto 2 - $20
            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="producto" value="Producto 2">
                <input type="hidden" name="precio" value="20">
                <button type="submit">Añadir al carrito</button>
            </form>
        </li>
    </ul>
</body>
</html>