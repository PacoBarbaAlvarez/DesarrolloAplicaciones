<?php

declare(strict_types=1);
require "includes/Producto.php";
require "includes/Carrito.php";

/*
    TAREAS A REALIZAR:
*/

// Generar 10 productos (los IDs que contengan deben ser del 1 al 10)

// Prueba a asignarle una cadena vacía como un nombre del producto con id 1, guardando en una variable $resultadoPruebaNombre una cadena que muestre el resultado de la asignación
$resultadoPruebaNombre = 

// Prueba a asignarle la cantidad -20 a la cantidad del producto con id 2, guardando en una variable $resultadoPruebaCantidad una cadena que muestre el resultado de la asignación
$resultadoPruebaCantidad = 

// Prueba a asignarle el ID 0 al producto con id 3, guardando en una variable $resultadoPruebaId una cadena que muestre el resultado de la asignación
$resultadoPruebaId = 

// Crea un objeto Carrito que contenga los 10 productos anteriores usando el constructor de la clase Carrito
$miCarrito = 

// Prueba a añadir el producto con id 4 al array de productos contenido en el objeto $miCarrito, guardando en una variable $resultadoPruebaAñadirProducto una cadena que muestre el resultado de la asignación
$resultadoPruebaAñadirProducto = 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Carrito de Compras</h1>

<h2>Resultado de las operaciones realizadas</h2>
<ul>
    <li>Resultado cambio de nombre del producto con ID 1: <?= $resultadoPruebaNombre ?> </li>
    <li>Resultado cambio de cantidad del producto con ID 2: <?= $resultadoPruebaCantidad ?> </li>
    <li>Resultado cambio de ID del producto con ID 3: <?= $resultadoPruebaId ?> </li>
    <li>Resultado de añadir el producto con ID 4: <?= $resultadoPruebaAñadirProducto ?> </li>
</ul>
<br>
<hr>
<h2>Detalles del carrito</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $miCarrito->muestraCarrito(); ?>
    </tbody>
</table>

<br>
<hr>
<h2>Resumen del Carrito</h2>
<p>Subtotal: <?= $miCarrito->calcularSubtotal() ?> €</p>
<p>Impuestos (21%): <?= $miCarrito->calcularImpuestos() ?> €</p>
<p class="total">Total: <?= $miCarrito->calcularTotal() ?> €</p>

</body>
</html>
