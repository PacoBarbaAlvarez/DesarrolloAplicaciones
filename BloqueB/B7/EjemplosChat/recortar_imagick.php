<?php 
// VARIABLES PARA ALMACENAR INFORMACIÓN
$mensaje = "";
$error = "";
$mover = false;
$creada_miniatura = false;  // Asegurarse de que la miniatura se cree correctamente

// TIPOS MIME PERMITIDOS
$tipos_permitidos = ["image/jpeg", "image/png", "image/jpg"];

// EXTENSIONES PERMITIDAS
$extensiones_permitidas = ["jpeg", "jpg", "png"];

// TAMAÑO MÁXIMO DE LA IMAGEN (5MB)
$tamano = 5242880;

// RUTA DE SUBIDA (RUTA ABSOLUTA)
$ruta   = dirname(_FILE_) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

// RUTA DE MINIATURAS (RUTA ABSOLUTA)
$ruta_miniaturas = dirname(_FILE_) . DIRECTORY_SEPARATOR . 'uploads/thumbs' . DIRECTORY_SEPARATOR;

// Verificar si las carpetas existen, si no, crearlas
if (!is_dir($ruta)) {
    mkdir($ruta, 0777, true); // Crear la carpeta de uploads si no existe
}
if (!is_dir($ruta_miniaturas)) {
    mkdir($ruta_miniaturas, 0777, true); // Crear la carpeta de thumbs si no existe
}

// FUNCIÓN PARA CREAR UNA MINIATURA DE LA IMAGEN
function crear_miniatura($ruta, $ruta_miniatura) {
    // Verificar si la carpeta de miniaturas es accesible
    if (!is_dir(dirname($ruta_miniatura))) {
        echo "La carpeta para miniaturas no existe o no es accesible: " . dirname($ruta_miniatura);
        return false;
    }

    $imagen = new Imagick($ruta);
    $imagen->thumbnailImage(200, 200, true);
    
    // Verifica si la miniatura se puede guardar
    if ($imagen->writeImage($ruta_miniatura)) {
        return true;
    } else {
        echo "No se pudo guardar la miniatura en: " . $ruta_miniatura;
        return false;
    }
}


// FUNCIÓN PARA CREAR UN NOMBRE DE ARCHIVO ÚNICO
function crear_nombre_archivo($nombre_archivo) {
    global $ruta; // Acceder a la variable global

    // OBTENER EL NOMBRE BASE Y LA EXTENSIÓN DEL ARCHIVO
    $nombre_base = pathinfo($nombre_archivo, PATHINFO_FILENAME);
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

    // LIMPIAR EL NOMBRE BASE, REEMPLAZANDO CARACTERES NO PERMITIDOS CON GUIONES
    $nombre_base = preg_replace('/[^A-Za-z0-9]/', '-', $nombre_base);

    // INICIALIZAR UN CONTADOR PARA EVITAR NOMBRES DUPLICADOS
    $i = 0;
    $nombre_nuevo = $nombre_base . '.' . $extension;

    // VERIFICAR SI YA EXISTE UN ARCHIVO CON EL MISMO NOMBRE
    while (file_exists($ruta . $nombre_nuevo)) {
        $i++; // INCREMENTAR EL CONTADOR
        $nombre_nuevo = $nombre_base . $i . '.' . $extension; // CREAR UN NUEVO NOMBRE DE ARCHIVO
    }
    
    return $nombre_nuevo; // DEVOLVER EL NOMBRE ÚNICO
}

// PROCESAR EL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] === 0) { 
        // COMPROBAR QUE EL ARCHIVO ES DEL TAMAÑO CORRECTO
        if ($_FILES['archivo']['size'] > $tamano) {
            $error = "El archivo es demasiado grande.";
        }

        // COMPROBAR QUE EL TIPO DE ARCHIVO SEA PERMITIDO
        $tipo = mime_content_type($_FILES['archivo']['tmp_name']);
        if (!in_array($tipo, $tipos_permitidos)) {
            $error = "Tipo de archivo no permitido.";
        }

        // VERIFICAR QUE LAS EXTENSIONES SON LAS PERMITIDAS
        $ext = strtolower(pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $extensiones_permitidas)) {
            $error = "Extensión de archivo incorrecta.";
        }

        if (empty($error)) {
            // CREAR UN NOMBRE DE ARCHIVO ÚNICO Y LIMPIARLO
            $nombre_archivo = crear_nombre_archivo($_FILES['archivo']['name']);
            $destino = $ruta . $nombre_archivo;
            $ruta_miniatura = $ruta_miniaturas . 'thumb_' . $nombre_archivo;

            // MOVER EL ARCHIVO A LA CARPETA DE DESTINO
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destino)) {
                $mover = true;
                // SI SE MUEVE CORRECTAMENTE, CREAR LA MINIATURA
                $creada_miniatura = crear_miniatura($destino, $ruta_miniatura);
            } else {
                $error = "Error al mover el archivo.";
            }
        }
    } else {
        $error = "Error al subir el archivo.";
    }

    // SI LA IMAGEN SE MOVIÓ Y SE CREÓ LA MINIATURA, MOSTRAR LA MINIATURA
    if ($mover === true && $creada_miniatura === true) {
        $mensaje = "Imagen cargada con éxito:<br><img src='/uploads/$nombre_archivo' width='200'><br>Miniatura creada: <img src='/uploads/thumbs/thumb_$nombre_archivo' width='100'>";
    } else {
        $mensaje = "<b>No se pudo cargar el archivo:</b> $error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
</head>
<body>
    <h2>Subir una imagen</h2>
    <!-- Formulario para subir una imagen -->
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="archivo">Selecciona una imagen:</label>
        <input type="file" name="archivo" accept="image/jpeg, image/png" required>
        <button type="submit">Subir</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <div class="mensaje">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>
</body>
</html>
