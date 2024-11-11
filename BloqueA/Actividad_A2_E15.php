<?php
$nombre = 'Paco';
$saludo = 'Hola';


if ($nombre) {
    $saludo = 'Bienvenido de nuevo, ' . $nombre;
}


$mensualidad = 50; 
$total = [];


for ($meses = 1; $meses <= 12; $meses++) {
    $subtotal = $mensualidad * $meses;
    $descuento = ($subtotal / 100) * ($meses * 5); 
    $total[$meses] = $subtotal - $descuento;
}


require 'includes/header2.php';
?>

<p><?= $saludo ?></p>
<h2>Descuento Mensual para Miembros</h2>
<table>
    <tr>
        <th>Meses</th>
        <th>Descuento</th>
    </tr>
    <?php foreach ($total as $meses => $precio) { ?>
    <tr>
        <td>
            <?= $meses ?>
            mes<?= ($meses === 1) ? '' : ''; ?>
        </td>
        <td>
            $<?= number_format($precio, 2) ?>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include 'includes/footer.php'; ?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css2/style2.css">
    </head>
</html>
