<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" name="subir" value="Subir Archivo">
    </form>

    <?php
    if (isset($_POST["subir"])) {
        if ($_FILES["archivo"]["error"] === 0) {
            echo "<p>Archivo subido correctamente: " . $_FILES["archivo"]["name"] . "</p>";
        } else {
            echo "<p>Error al subir el archivo.</p>";
        }
    }
    ?>
</body>
</html>
