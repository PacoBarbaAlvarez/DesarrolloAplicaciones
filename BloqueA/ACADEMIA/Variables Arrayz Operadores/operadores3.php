<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = 5;
    $num2 = 10;
    $num3 = 5;
    $activo1=true;
    $activo2=false;

    // SE CUMPLE CUNADO LAS OPERACIONES SEAN VERDADERAS
    if($num1==5 && $num1 == $num3){
        echo "DENTRO DEL IF";
    }

    echo "<br>";

    // SE CULPLE CUANDO 1 DE LAS OPERACIONES SEA VERDADERA
    if($num1==5 or $num1 == $num2){
        echo "DENTRO DEL SEGUNDO IF";
    }

    echo "<br>";

    // SE CUMPLE CUANDO 1 DE LAS OPERACIONES SEA FALSA (LAS DOS NO PUEDEN SER VERDADERAS)
    if($num1==5 xor $num1 == $num3){
        echo "DENTRO DEL TERCER IF";
    }

    echo "<br>";

    if($activo1){// ESTO ES IGUAL QUE PONER $activo1 = true
        echo "DENTRO DEL CUARTO IF";
    }
    ?>
</body>
</html>