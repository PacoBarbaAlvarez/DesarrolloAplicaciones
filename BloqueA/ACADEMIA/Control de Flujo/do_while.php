<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DO WHILE</title>
</head>
<body>
   <?php 
   // ESTRUCTURA DE CONTROL DE FLUJO DO WHILE
   $valor= 10;

   while($valor !=10){
    echo "Dentro del while";
   }

   // ESTE SE EJECUTA MÍNIMO 1 VEZ
   do{
    echo"Dentro del do while";
   }while($valor !=10);
   ?> 
</body>
</html>