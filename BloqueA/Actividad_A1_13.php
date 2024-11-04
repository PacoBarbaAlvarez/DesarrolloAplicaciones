<?php
$ofertas = [
['nombre' => 'Ordenador','precio' => 1005,'stock' => 4,],
['nombre' => 'Portatil','precio' => 900,'stock' => 10,],
['nombre' => 'Movil','precio' => 200,'stock' => 34,],
['nombre' => 'Tablet','precio' => 150,'stock' => 52,],
];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tienda de electronica</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h1>Tienda de Electrónica</h1>
        <h2>Ofertas</h2>
        <p><?php echo $ofertas[0]['nombre']; ?> -
        $<?php echo $ofertas[0]['precio']; ?> </p>
        <p><?php echo $ofertas[1]['nombre']; ?> -
        $<?php echo $ofertas[1]['precio']; ?> </p>
        <p><?php echo $ofertas[2]['nombre']; ?> -
        $<?php echo $ofertas[2]['precio']; ?> </p>
        <p><?php echo $ofertas[3]['nombre']; ?> -
        $<?php echo $ofertas[3]['precio']; ?> </p>
    </body>
</html>