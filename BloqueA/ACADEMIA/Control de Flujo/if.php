<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // ESTRUCTURA DE CONTROL FLUJO IF
   $nota1 = 6;
   $nota2 = 8;
   $nota3 = 5;

   if($nota1>=5){
    echo "Aprobada";
   }
    echo "<br>";

   if($nota2!=0):
    echo "La nota 2 es diferente de 0";
   endif;

   echo "<br>";

   // IF ANIDADO
   if ($nota3 ==5){
    echo "Dentro del primer IF"; 
    echo "<br>";

    if($nota2<9){
        echo "Dentro del segundo IF";
        echo "<br>";

   }
}

if ($nota1 >=5 && $nota2 >=5){
    echo "Curso Aprobado";
}
   

   ?> 
</body>
</html>