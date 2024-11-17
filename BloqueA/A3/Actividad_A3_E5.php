<?php
$tax_rate = 0.25; // Cambiamos la tasa de impuestos a 25%
$global_discount = 0.1; // Descuento global del 10%

function calculate_running_total($price, $quantity)
{
    global $tax_rate, $global_discount; // Acceso a las variables globales
    static $running_total = 0;
    
    $total = $price * $quantity; // Cálculo del total base
    $discounted_total = $total - ($total * $global_discount); // Aplicar descuento global
    $tax = $discounted_total * $tax_rate; // Calcular impuesto sobre el total descontado
    $running_total = $running_total + $discounted_total + $tax; // Actualizar total acumulado
    
    return number_format($running_total, 2); // Retornar con 2 decimales
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Global and Static Variables</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Running Total</th>
            </tr>

            <tr>
                <td>Mints:</td>
                <td>$2</td>
                <td>5</td>
                <td>$<?= calculate_running_total(2, 5) ?></td>
            </tr>
            <tr>
                <td>Toffee:</td>
                <td>$3</td>
                <td>5</td>
                <td>$<?= calculate_running_total(3, 5) ?></td>
            </tr>
            <tr>
                <td>Fudge:</td>
                <td>$5</td>
                <td>4</td>
                <td>$<?= calculate_running_total(5, 4) ?></td>
            </tr>
            <!-- Nuevos productos -->
            <tr>
                <td>Chewing Gum:</td>
                <td>$1.50</td>
                <td>10</td>
                <td>$<?= calculate_running_total(1.50, 10) ?></td>
            </tr>
            <tr>
                <td>Chocolate Bar:</td>
                <td>$2.50</td>
                <td>6</td>
                <td>$<?= calculate_running_total(2.50, 6) ?></td>
            </tr>
        </table>
        <p><strong>Tax Rate:</strong> <?= $tax_rate * 100 ?>%</p>
        <p><strong>Global Discount:</strong> <?= $global_discount * 100 ?>%</p>
    </body>
</html>
