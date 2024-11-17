<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica PHP</title>
</head>
<body>
    <?php 

    // INICIALIZAMOS LOS VALORES
    $valor1=10;
    $valor2=5;

    // FUNCIÓN PRUEBA
    function prueba(){
        global $valor1, $valor2;
        $resultado=$valor1+$valor2;
        echo $resultado;
    }
    // PRUEBA
    prueba();
    ?>
</body>
</html>