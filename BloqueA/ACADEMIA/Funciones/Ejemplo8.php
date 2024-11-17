<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// Paso por valor y por referencia

function mifuncion($num1){
    $num1 = $num1 + 2;
}

function otrafuncion(&$num1){
    $num1 = $num1 + 2;
}

$num1 = 4;

mifuncion($num1);

echo $num1;

echo "<br>";

otrafuncion($num1);

echo $num1;

?>

</body>
</html>