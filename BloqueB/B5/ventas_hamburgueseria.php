<?php
include 'includes/header.php';
// Precios de las hamburguesas
$precios = [
    "Hamburguesa Clásica" => 5.50,
    "Hamburguesa con Queso" => 6.75,
    "Hamburguesa BBQ" => 7.25,
    "Hamburguesa Vegetariana" => 6.00,
];

// 1. Generar cantidad aleatoria de ventas
$ventasDia = mt_rand(50, 100);
echo "<h2>Total de ventas del día: $ventasDia</h2>";

// Inicialización de variables
$totalDia = 0;
$detalleVentas = [];

// 2. Generar ventas aleatorias
for ($i = 0; $i < $ventasDia; $i++) {
    // Selección aleatoria de hamburguesa
    $tipo = array_rand($precios);
    // Cantidad aleatoria de hamburguesas por venta
    $cantidad = mt_rand(1, 5);
    // Cálculo del total por esta venta
    $subtotal = round($cantidad * $precios[$tipo], 2);
    $totalDia += $subtotal;
    $detalleVentas[] = [
        "tipo" => $tipo,
        "cantidad" => $cantidad,
        "subtotal" => $subtotal,
    ];
}

// 3. Calcular el total del día
$totalDiaFormateado = number_format($totalDia, 2, ',', '.');

// 4. Calcular estadísticas
$sqrtTotal = round(sqrt($totalDia), 2);
$potenciaTotal = number_format(pow($totalDia, 2), 2, ',', '.');
$totalCeil = ceil($totalDia);
$totalFloor = floor($totalDia);

// Mostrar resultados
echo "<h3>Detalle de las ventas</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Tipo</th><th>Cantidad</th><th>Subtotal ($)</th></tr>";
foreach ($detalleVentas as $venta) {
    echo "<tr>
            <td>{$venta['tipo']}</td>
            <td>{$venta['cantidad']}</td>
            <td>\${$venta['subtotal']}</td>
          </tr>";
}
echo "</table>";

echo "<h3>Totales y Estadísticas</h3>";
echo "<p><b>Total del día:</b> \$$totalDiaFormateado</p>";
echo "<p><b>Raíz cuadrada del total:</b> $sqrtTotal</p>";
echo "<p><b>Total elevado al cuadrado:</b> $potenciaTotal</p>";
echo "<p><b>Redondeado hacia arriba (ceil):</b> $totalCeil</p>";
echo "<p><b>Redondeado hacia abajo (floor):</b> $totalFloor</p>";
include 'includes/footer.php';
?>
