<?php
$moved         = false;                                        // Estado de movimiento
$message       = '';                                           // Mensaje a mostrar
$error         = '';                                           // Inicialización de errores
$upload_path   = '/var/www/images/';                           // Directorio de destino
$max_size      = 5242880;                                      // Tamaño máximo: 5MB
$allowed_types = ['image/jpeg', 'image/png'];                 // Tipos MIME permitidos
$allowed_exts  = ['jpeg', 'jpg', 'png'];                      // Extensiones permitidas

// Función para limpiar y generar nombres únicos de archivos
function create_filename($filename, $upload_path) {
    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Obtener el nombre base
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Obtener la extensión
    $basename   = preg_replace('/[^A-Za-z0-9]/', '-', $basename); // Limpiar nombre

    $filename   = $basename . '.' . $extension;                // Nombre final
    $i          = 0;                                           // Contador

    while (file_exists($upload_path . $filename)) {            // Si ya existe...
        $i++;
        $filename = $basename . '-' . $i . '.' . $extension;   // Agregar número al nombre
    }
    return $filename;                                          // Retornar nombre único
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === 0) {
        // Verificar que el directorio existe, si no, crearlo
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $temp      = $_FILES['image']['tmp_name'];             // Ruta temporal
        $size      = $_FILES['image']['size'];                 // Tamaño del archivo
        $type      = mime_content_type($temp);                 // Tipo MIME
        $ext       = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // Extensión

        // Validaciones
        if ($size > $max_size) {
            $error .= 'El archivo es demasiado grande (máximo 5MB). ';
        }
        if (!in_array($type, $allowed_types)) {
            $error .= 'Formato no permitido. Solo se permiten imágenes JPG y PNG. ';
        }
        if (!in_array($ext, $allowed_exts)) {
            $error .= 'Extensión de archivo no válida. ';
        }

        // Si no hay errores, mover el archivo
        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $moved       = move_uploaded_file($temp, $destination);
        }
    } else {
        $error .= 'No se seleccionó un archivo o hubo un error al subirlo.';
    }

    // Resultado final
    if ($moved) {
        $message = '<p>Imagen subida con éxito:</p>';
        $message .= '<img src="/images/' . htmlspecialchars($filename) . '" width="300">';
    } else {
        $message = '<p style="color:red;"><b>Error:</b> ' . $error . '</p>';
    }
}
?>

<?php include 'includes/header.php'; ?>
<?= $message ?>

<form method="POST" action="validate-file.php" enctype="multipart/form-data">
  <label for="image"><b>Subir imagen de perfil:</b></label>
  <input type="file" name="image" accept="image/jpeg, image/png" id="image"><br>
  <input type="submit" value="Subir imagen">
</form>

<?php include 'includes/footer.php'; ?>
