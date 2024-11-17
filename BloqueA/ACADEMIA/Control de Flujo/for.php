<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     $num=5;

     // ESTRUCTURA DE CONTROL DE FLUJO FOR Y FOREACH
     for ($i=0; $i<=10; $i++){
        //echo $i;
        //echo "<br>";
    }

     for($j=0; $j>=1; $j--){
        //echo $j;
       // echo "<br>";
     }

     for($k=1; $k<=100; $k=$k+2){
        
        //echo $k;
        //echo "<br>";
     }

     // ESTA MANERA ES UN POCO MÁS TEDIOSA PERO TE LO RESULEVE DE IGUAL FORMA
     for($k=1; $k<=100; $k++){
        if($k%2==0){
            echo $k;
        }
     }
     
    ?>
</body>
</html>