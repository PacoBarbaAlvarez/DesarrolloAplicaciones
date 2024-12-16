<?php

declare(strict_types=1);
require "includes/Producto.php";
require "includes/Carrito.php";

/*
    TAREAS A REALIZAR:
*/

// Generar 10 productos (los IDs que contengan deben ser del 1 al 10)
$producto1 = new Producto ("Macarrones", 14.8, 4, 1 );
$producto2 = new Producto ("Pan", 5.6, 2, 2 );
$producto3 = new Producto ("Lentajas", 10.5, 10, 3 );
$producto4 = new Producto ("Cereales", 9.5, 5, 4 );
$producto5 = new Producto ("Leche", 20.7, 3, 5 );
$producto6 = new Producto ("Agua", 19.2, 1, 6 );
$producto7 = new Producto ("Aceite", 30.1, 6, 7 );
$producto8 = new Producto ("Polvorones", 2.5, 7, 8 );
$producto9 = new Producto ("Carne", 17.2, 9, 9 );
$producto10 = new Producto ("Pescado", 40.2, 11, 10 );

// Prueba a asignarle una cadena vacía como un nombre del producto con id 1, guardando en una variable $resultadoPruebaNombre una cadena que muestre el resultado de la asignación
$resultadoPruebaNombre = $producto1->setNombre("") ? "Nombre cambiado" : "Error";

// Prueba a asignarle la cantidad -20 a la cantidad del producto con id 2, guardando en una variable $resultadoPruebaCantidad una cadena que muestre el resultado de la asignación
$resultadoPruebaCantidad = $producto2->setCantidad(0);

// Prueba a asignarle el ID 0 al producto con id 3, guardando en una variable $resultadoPruebaId una cadena que muestre el resultado de la asignación
$resultadoPruebaId = $producto3->setID(0);

// Crea un objeto Carrito que contenga los 10 productos anteriores usando el constructor de la clase Carrito
$miCarrito = new Carrito();
$miCarrito->agregarProducto($producto1);
$miCarrito->agregarProducto($producto2);
$miCarrito->agregarProducto($producto3);
$miCarrito->agregarProducto($producto4);
$miCarrito->agregarProducto($producto5);
$miCarrito->agregarProducto($producto6);
$miCarrito->agregarProducto($producto7);
$miCarrito->agregarProducto($producto8);
$miCarrito->agregarProducto($producto9);
$miCarrito->agregarProducto($producto10);


// Prueba a añadir el producto con id 4 al array de productos contenido en el objeto $miCarrito, guardando en una variable $resultadoPruebaAñadirProducto una cadena que muestre el resultado de la asignación
$resultadoPruebaAñadirProducto = "";

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
        <?php echo $miCarrito->muestraCarrito(); ?>
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
