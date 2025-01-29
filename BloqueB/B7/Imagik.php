<?php
$moved         = false;                                        // Estado de movimiento
$message       = '';                                           // Mensaje a mostrar
$error         = '';                                           // Inicialización de errores
$upload_path   = 'uploads/';                                   // Carpeta de imágenes originales
$thumbs_path   = 'uploads/thumbs/';                           // Carpeta para miniaturas
$max_size      = 5242880;                                      // Tamaño máximo: 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];     // Tipos MIME permitidos
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif'];               // Extensiones permitidas

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

// Función para redimensionar imágenes usando Imagick
function resize_image_imagick($orig_path, $new_path, $max_width, $max_height) {
    try {
        $imagick = new Imagick($orig_path);  
        $imagick->setImageFormat('jpeg');    

        // Redimensionar manteniendo la relación de aspecto
        $imagick->thumbnailImage($max_width, $max_height, true);

        $imagick->writeImage($new_path);
        $imagick->destroy();

        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === 0) {
        // Crear carpetas si no existen
        if (!is_dir($upload_path)) mkdir($upload_path, 0777, true);
        if (!is_dir($thumbs_path)) mkdir($thumbs_path, 0777, true);

        $temp      = $_FILES['image']['tmp_name'];             
        $size      = $_FILES['image']['size'];                 
        $type      = mime_content_type($temp);                 
        $ext       = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // Validaciones
        if ($size > $max_size) {
            $error .= 'El archivo es demasiado grande (máximo 5MB). ';
        }
        if (!in_array($type, $allowed_types)) {
            $error .= 'Formato no permitido. Solo se permiten imágenes JPG, PNG y GIF. ';
        }
        if (!in_array($ext, $allowed_exts)) {
            $error .= 'Extensión de archivo no válida. ';
        }

        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbpath   = $thumbs_path . $filename;
            $moved       = move_uploaded_file($temp, $destination);
            $resized     = resize_image_imagick($destination, $thumbpath, 200, 200);
        }
    } else {
        $error .= 'No se seleccionó un archivo o hubo un error al subirlo.';
    }

    // Resultado final
    if ($moved && $resized) {
        $message = '<p>Imagen subida con éxito:</p>';
        $message .= '<p>Miniatura:</p>';
        $message .= '<img src="' . htmlspecialchars($thumbpath) . '" width="200">';
        $message .= '<p>Imagen original:</p>';
        $message .= '<img src="' . htmlspecialchars($destination) . '" width="300">';
    } else {
        $message = '<p style="color:red;"><b>Error:</b> ' . $error . '</p>';
    }
}
?>

<?php include 'includes/header.php'; ?>
<?= $message ?>

<form method="POST" action="Imagik.php" enctype="multipart/form-data">
  <label for="image"><b>Subir imagen de producto:</b></label>
  <input type="file" name="image" accept="image/jpeg, image/png, image/gif" id="image"><br>
  <input type="submit" value="Subir imagen">
</form>

<?php include 'includes/footer.php'; ?>
