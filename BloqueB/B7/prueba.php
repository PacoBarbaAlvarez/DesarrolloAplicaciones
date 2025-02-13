<?php 
$imagick = new Imagick();
echo "Formatos soportados por Imagick: <br>";
print_r($imagick->queryFormats());

?>