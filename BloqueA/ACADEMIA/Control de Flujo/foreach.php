<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // ESTRUCTURA DE CONTROL FLUJO FOREACH
   $array= array(1,2,3,4,5);
   $valores = array("uno"=>1,"dos"=>2,"tres"=>3,"cuatro"=>4,"cinco"=>5);

   foreach ($array as $valor){
    echo $valor;
    echo "<br>";
   }

   foreach($valores as $k=>$v){
    echo $k . " ";
    echo $v;
   }
   ?> 
</body>
</html>