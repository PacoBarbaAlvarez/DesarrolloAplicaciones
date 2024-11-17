<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // Continue

   for($i=1; $i<=10; $i++){
    if($i==3){
        continue; // SE SALTA EL NUMERO QUE LE ESCRIBAMOS
    }

    echo "El valor de i" . $i;
    echo "<br>";
   }
   ?> 
</body>
</html>