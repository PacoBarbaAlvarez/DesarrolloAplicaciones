<?php

$filas = 0;

$columnas = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <?php for($i = 1; $i < 2; $i++){ ?>
        <?php $filas = 5 * $i; ?>
        <?php $columnas = 6 * $i; ?>

        <?php for($j = 0; $j < ($columnas); $j++){ ?>

            <td>(1,<?php echo $j+1 ?>)</td>

        <?php } ?> 

        <?php for($k = 0; $k < ($filas); $k++){ ?>


            <tr>
                
                <td>(<?php echo $k+1 ?>,1)</td>

        <?php } ?> 

        <?php for($j = 1; $j < ($columnas); $j++){ ?>

            <td>(<?php echo $filas ?>, <?php echo $j+1 ?>)</td>

        <?php } ?> 

        </tr>

        
    <?php } ?> 
</table>
<hr>
<br>
<table>
    <?php for($i = 2; $i < 3; $i++){ ?>
        <?php $filas = 5 * $i; ?>
        <?php $columnas = 6 * $i; ?>

        <?php for($j = 0; $j < ($columnas); $j++){ ?>

            <td>(1,<?php echo $j+1 ?>)</td>

        <?php } ?> 

        <?php for($k = 0; $k < ($filas); $k++){ ?>

            

            <tr>
                
                <td>(<?php echo $k+1 ?>,1)</td>




        <?php } ?> 

        <?php for($j = 1; $j < ($columnas); $j++){ ?>

            <td>(<?php echo $filas ?>, <?php echo $j+1 ?>)</td>

        <?php } ?> 

        </tr>

        
    <?php } ?> 
</table>
<hr>
<br>
<table>
    <?php for($i = 3; $i < 4; $i++){ ?>
        <?php $filas = 5 * $i; ?>
        <?php $columnas = 6 * $i; ?>

        <?php for($j = 0; $j < ($columnas); $j++){ ?>

            <td>(1,<?php echo $j+1 ?>)</td>

        <?php } ?> 

        <?php for($k = 0; $k < ($filas); $k++){ ?>

            

            <tr>
                
                <td>(<?php echo $k+1 ?>,1)</td>




        <?php } ?> 

        <?php for($j = 1; $j < ($columnas); $j++){ ?>

            <td>(<?php echo $filas ?>, <?php echo $j+1 ?>)</td>

        <?php } ?> 

        </tr>

        
    <?php } ?> 
</table>


</body>
</html>