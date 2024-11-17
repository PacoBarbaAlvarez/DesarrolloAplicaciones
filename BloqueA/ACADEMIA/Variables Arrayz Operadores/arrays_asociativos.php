<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // ARRAYS ASOCIATIVOS
    $navegadores = array("navegador1" => "Mozilla Firefox", "navegador2" => "Google Chrome", "navegador3" => "Opera");
    $datos = array("nombre" => "Juan", "edad" => 25, "profesor" => true, 3 =>100);

    echo "Navegador 3:" . $navegadores["navegador3"];
    echo "<br>";
    echo "Nombre: " . $datos["nombre"];
    echo "<br>";
    echo "Dato 3: " . $datos["3"];
    echo "<br>";

    var_dump($navegadores); // CON VAR_DUMP PODEMOS VER TODA LA INFORMACIÓN DEL ARRAY

    ?>
</body>
</html>