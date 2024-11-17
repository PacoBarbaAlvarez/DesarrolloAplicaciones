<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $valor1= 2;
    $valor2= 6;
    $dia=4;

    // ESTRUCTURA DE CONTROL DE FLUJO ELSEIF
    if ($valor1>$valor2){
        echo "valor1 es mayor que valor 2";
        echo "<br>";
    }
    elseif ($valor1==$valor2){
        echo "valor1 es igual a valor 2";
        echo "<br>";
    }
    else{
        echo "valor1 es menor que valor 2";
        echo "<br>";
    }

    // EJEMPLO DE USO UN POCO MÁS REALISTA
    if($dia== 1){
        echo "El dia es lunes";
    }
    elseif($dia==2){
        echo "El dia es martes";
    }
    elseif($dia==3){
        echo "El dia es miercoles";
    }
    elseif($dia==4){
        echo "El dia es jueves";
    }
    ?>
</body>
</html>