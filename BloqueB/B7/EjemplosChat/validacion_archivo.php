<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validar Archivo</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" name="subir" value="Subir Archivo">
    </form>

    <?php
    if (isset($_POST["subir"])) {
        $archivo = $_FILES["archivo"];
        $permitidos = ["image/jpeg", "image/png"];
        $maxSize = 2 * 1024 * 1024; // 2MB

        if ($archivo["error"] !== 0) {
            echo "<p>Error al subir el archivo.</p>";
        } elseif (!in_array($archivo["type"], $permitidos)) {
            echo "<p>Formato no permitido. Solo JPG y PNG.</p>";
        } elseif ($archivo["size"] > $maxSize) {
            echo "<p>El archivo supera los 2MB.</p>";
        } else {
            echo "<p>Archivo válido: " . $archivo["name"] . "</p>";
        }
    }
    ?>
</body>
</html>
