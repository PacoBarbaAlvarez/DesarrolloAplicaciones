<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // ESTRUCTURA DE CONTROL DE FLUJO WHILE
   $num = 0;
   $respuesta="Oporto";
   $intentos = 1;
   
   // SI HACEMOS ESTO SE PRODUCE UN BUCLE INFINITO
   /*while($num <= 10){
    echo $num;
   }*/

   while($num <= 10){
    echo $num;
    echo "<br>";
    $num ++;
   }


   while($respuesta != "Lisboa"){
    echo "Inetnto " . $intentos;
    echo "<br>";
        if($intentos == 3){
            $respuesta = "Lisboa";
    }
   $intentos ++;
}
   ?> 
</body>
</html>