<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // INCLUDE

   echo "Soy el primer Fichero";
   echo "<br>";
   include "include2.php";
   echo "<br>";
   include "include2.php";

   // REQUIRE ( SE USA SI EL FICHERO QUE QUEREMOS USAR DEBE ESTAR SI O SI)
   echo "Soy el primer Fichero";
   echo "<br>";
   require "include2.php";
   echo "<br>";
   require "include2.php";
   ?> 
</body>
</html>