<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // BREAK
   for($i=1; $i<=10; $i++){
    echo "Valor de i: " . $i;
    echo "<br>";
        if($i==3){
            break;
        }
   }

   // BUCLE ASOCIATIVO
   for($j=1; $j<=10;$j++){
    echo "Valor de j: " . $j;
    echo "<br>";
        for($k=1; $k<=10;$k++){
            echo "Valor de k: " . $k;
            echo "<br>";
            if($i==3){
                break 2; // AL PONER EL BREAK 2 SE TERMINAN LOS DOS BUCLES
            }
        }
   }
   ?> 
</body>
</html>