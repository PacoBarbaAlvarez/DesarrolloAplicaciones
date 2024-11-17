<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    // PREDEFINIDAS

    $numero=33;

    echo "Nombre del servidor" . $_SERVER['SERVER_NAME'];
    echo "<br>";

    echo "Software del servidor" . $_SERVER['SERVER_SOFTWARE'];
    echo "<br>";

    echo "Puerto del Servidor" . $_SERVER['SERVER_PORT'];
    echo "<br>";

    echo "La variable número es: " . $GLOBALS['numero']; // ES UNA MANERA DE MÁS COMPLICADA DE LLAMAR A LA VARIABLE

    echo "<br>";
    echo "El numero de la variables es: ". $numero;

    ?>
</body>
</html>