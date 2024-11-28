<?php

$array2 = [
'numeros' => [1,2,3,4,5,6,7,8,9,10],
];

function mostrarArray($array){

    $formato = "( " . number_format($array) . " )";
    return $formato;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= mostrarArray($array2['numeros']) ?>
</body>
</html>