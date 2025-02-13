<?php
if (isset($_POST["subir"])) {
    $archivo = $_FILES["archivo"];
    $directorio = "uploads/";

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $nombre_limpio = preg_replace("/[^a-zA-Z0-9\.-]/", "_", pathinfo($archivo["name"], PATHINFO_FILENAME));
    $extension = pathinfo($archivo["name"], PATHINFO_EXTENSION);
    $contador = 1;
    $nuevo_nombre = $nombre_limpio . "." . $extension;

    while (file_exists($directorio . $nuevo_nombre)) {
        $nuevo_nombre = $nombre_limpio . "_" . $contador . "." . $extension;
        $contador++;
    }

    if (move_uploaded_file($archivo["tmp_name"], $directorio . $nuevo_nombre)) {
        echo "<p>Archivo guardado como: " . $nuevo_nombre . "</p>";
    } else {
        echo "<p>Error al mover el archivo.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mover Archivo</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" name="subir" value="Subir Archivo">
    </form>
</body>
</html>
