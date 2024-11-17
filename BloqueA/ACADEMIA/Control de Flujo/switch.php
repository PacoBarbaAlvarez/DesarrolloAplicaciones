<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // ESTRUCTURA DE CONTROL FLUJO SWITCH
    $dia=3;

    switch ($dia){
        case 1: 
            echo "Lunes";
            break;
        case 2:
            echo "Martes";
            break;
        case 3:
            echo "Miercoles";
            break;
        case 4:
            echo "Jueves";
            break;
        case 5:
            echo "Viernes";
            break;
        default:
            echo "El dia no es valido";
            break;
    }

    $diasemana= "Miercoles";
    switch ($diasemana){
        case "Lunes":
            echo 1;
            break;
        case "Martes":
            echo 2;
            break;
        case "Miercoles":
            echo 3;
            break;
        case "Jueves":
            echo 4;
            break;
        case "Viernes":
            echo 5;
            break;
        default:
            echo "El dia no es valido";
            break;
    }
    ?>
</body>
</html>