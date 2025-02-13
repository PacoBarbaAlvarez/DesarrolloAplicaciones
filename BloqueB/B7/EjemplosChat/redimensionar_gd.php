<?php
function redimensionarImagen($ruta_original, $ruta_destino, $nuevo_ancho, $nuevo_alto) {
    list($ancho, $alto, $tipo) = getimagesize($ruta_original);

    switch ($tipo) {
        case IMAGETYPE_JPEG:
            $imagen = imagecreatefromjpeg($ruta_original);
            break;
        case IMAGETYPE_PNG:
            $imagen = imagecreatefrompng($ruta_original);
            break;
        default:
            return false;
    }

    $thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
    imagecopyresampled($thumb, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

    switch ($tipo) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumb, $ruta_destino);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumb, $ruta_destino);
            break;
    }

    imagedestroy($imagen);
    imagedestroy($thumb);
    return true;
}

if (isset($_POST["subir"])) {
    $archivo = $_FILES["archivo"];
    $ruta_original = "uploads/" . $archivo["name"];
    $ruta_miniatura = "thumbnails/" . $archivo["name"]; 

    if (move_uploaded_file($archivo["tmp_name"], $ruta_original)) {
        if (redimensionarImagen($ruta_original, $ruta_miniatura, 200, 200)) {
            echo "<p>Miniatura creada: <img src='$ruta_miniatura'></p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Redimensionar Imagen</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" name="subir" value="Subir Imagen">
    </form>
</body>
</html>
