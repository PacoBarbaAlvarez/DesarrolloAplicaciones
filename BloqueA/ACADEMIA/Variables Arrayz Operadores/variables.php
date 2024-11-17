<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // VARIABLES
    $edad=20;
    $estatura=1.83;
    $nombre="Jesús Lavado García";
    $frase="Jesús tine $edad años";
    $profesor = true;

    // MOSTRAMOS LAS VARIABLES
    echo $edad;
    echo "<br>";
    echo $estatura;
    echo "<br>";
    echo "Tu nombre es " . $nombre; // EL "." SIRVE PARA CONCATENAR
    echo "<br>";
    echo $frase;
    echo "<br>";
    echo json_encode($profesor); // JSON TRANSFORMA EL VALOR EN TEXTO


    ?>
</body>
</html>