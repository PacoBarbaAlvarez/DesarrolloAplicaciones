<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

//  Funciones

$numero1 = 5;
$numero2 = 10;

// Funcion sin variables
function sumar(){
    echo "Soy una funcion para sumar";
    echo "<br>";
}

sumar();

// Funcion con variables
function sumarNumeros($num1, $num2){
    echo $num1 + $num2;
    echo "<br>";
}

sumarNumeros($numero1, 1);

// Funcion con retorno
function sumarNumerosRetorno($num1, $num2){
    return $num1 + $num2;
}

$resultado = sumarNumerosRetorno($numero1, $numero2);

echo $resultado;

?>

</body>
</html>