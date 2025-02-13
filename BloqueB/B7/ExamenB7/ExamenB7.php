<?php

// Variables para almacenar información
$nombre_primer_plato = ''; // Nombre del primer plato
$descripcion_primer_plato = ''; // Descripción del primer plato
$precio_primer_plato = ''; // Precio del primer plato

$nombre_segundo_plato = ''; 
$descripcion_segundo_plato = ''; 
$precio_segundo_plato = ''; 

$nombre_postre = ''; 
$descripcion_postre = ''; 
$precio_postre = ''; 

// Bebida incluida será un checkbox con valores Sí/No
$bebida_incluida = ''; 

$message = ''; 
$error = ''; 
$upload_path = 'imagenes/'; // Ruta donde se subirán las imágenes
$thumbnail_path = 'imagenes/miniaturas/'; // Ruta donde se guardarán las miniaturas
$max_size = 5242880; // 5 MB
$allowed_types = ['image/jpeg', 'image/png']; 
$allowed_exts = ['jpeg', 'png']; 

// Asegúrate de que la carpeta de miniaturas exista
if (!is_dir($thumbnail_path)) {
    mkdir($thumbnail_path, 0755, true);
}

function resize_image_gd($orig_path, $new_path, $max_width, $max_height)
{
    $image_data = getimagesize($orig_path); 
    $orig_width = $image_data[0]; 
    $orig_height = $image_data[1]; 
    $media_type = $image_data['mime'];
    $orig_ratio = $orig_width / $orig_height; 

    // Calcula las nuevas dimensiones
    if ($orig_width > $orig_height) {
        $new_width = $max_width;
        $new_height = $max_width / $orig_ratio;
    } else {
        $new_height = $max_height;
        $new_width = $max_height * $orig_ratio;
    }

    // Crea la imagen original según su tipo
    switch ($media_type) {
        case 'image/jpeg':
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case 'image/png':
            $orig = imagecreatefrompng($orig_path);
            break;
        default:
            return false; 
    }

    $new = imagecreatetruecolor($new_width, $new_height); // Crea una nueva imagen
    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height); // Redimensiona la imagen

    // Guarda la imagen redimensionada según su tipo
    switch ($media_type) {
        case 'image/jpeg':
            imagejpeg($new, $new_path);
            break;
        case 'image/png':
            imagepng($new, $new_path);
            break;
    }
    return true; 
}

// Comprobación de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Recoge los datos del formulario
    $nombre_primer_plato = filter_input(INPUT_POST, 'nombre_primer_plato', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descripcion_primer_plato = filter_input(INPUT_POST, 'descripcion_primer_plato', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $precio_primer_plato = filter_input(INPUT_POST, 'precio_primer_plato', FILTER_SANITIZE_NUMBER_FLOAT);

    $nombre_segundo_plato = filter_input(INPUT_POST, 'nombre_segundo_plato', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descripcion_segundo_plato = filter_input(INPUT_POST, 'descripcion_segundo_plato', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $precio_segundo_plato = filter_input(INPUT_POST, 'precio_segundo_plato', FILTER_SANITIZE_NUMBER_FLOAT);

    $nombre_postre = filter_input(INPUT_POST, 'nombre_postre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descripcion_postre = filter_input(INPUT_POST, 'descripcion_postre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $precio_postre = filter_input(INPUT_POST, 'precio_postre', FILTER_SANITIZE_NUMBER_FLOAT);

    $bebida_incluida = isset($_POST['bebida_incluida']) ? 'Sí' : 'No';

    // Validar nombre_primer_plato
    if (empty($nombre_primer_plato) || !preg_match("/^[a-zA-Z\s]{1,20}$/", $nombre_primer_plato)) {
        $error .= 'El nombre del primer plato es obligatorio y debe contener solo letras y tener entre 1 y 20 caracteres.<br>';
    }
    // Validar descripcion_primer_plato
    if (empty($descripcion_primer_plato) || !preg_match("/^[a-zA-Z0-9\s]{1,200}$/", $descripcion_primer_plato)) {
        $error .= 'La descripción del primer plato es obligatoria y debe contener solo letras, números y espacios.<br>';
    }
    // Validar precio_primer_plato
    if (empty($precio_primer_plato) || !preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $precio_primer_plato)) {
        $error .= 'El precio del primer plato es obligatorio y debe ser un número válido.<br>';
    }

    // Validar nombre_segundo_plato
    if (empty($nombre_segundo_plato) || !preg_match("/^[a-zA-Z\s]{1,20}$/", $nombre_segundo_plato)) {
        $error .= 'El nombre del segundo plato es obligatorio y debe contener solo letras y tener entre 1 y 20 caracteres.<br>';
    }
    // Validar descripcion_segundo_plato
    if (empty($descripcion_segundo_plato) || !preg_match("/^[a-zA-Z0-9\s]{1,200}$/", $descripcion_segundo_plato)) {
        $error .= 'La descripción del segundo plato es obligatoria y debe contener solo letras, números y espacios.<br>';
    }
    // Validar precio_segundo_plato
    if (empty($precio_segundo_plato) || !preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $precio_segundo_plato)) {
        $error .= 'El precio del segundo plato es obligatorio y debe ser un número válido.<br>';
    }

    // Validar nombre_postre
    if (empty($nombre_postre) || !preg_match("/^[a-zA-Z\s]{1,20}$/", $nombre_postre)) {
        $error .= 'El nombre del postre es obligatorio y debe contener solo letras y tener entre 1 y 20 caracteres.<br>';
    }
    // Validar descripcion_postre
    if (empty($descripcion_postre) || !preg_match("/^[a-zA-Z0-9\s]{1,200}$/", $descripcion_postre)) {
        $error .= 'La descripción del postre es obligatoria y debe contener solo letras, números y espacios.<br>';
    }
    // Validar precio_postre
    if (empty($precio_postre) || !preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $precio_postre)) {
        $error .= 'El precio del postre es obligatorio y debe ser un número válido.<br>';
    }

    // Procesa las imágenes
    $images = [
        'plato1' => $_FILES['imagen_primer_plato'], 
        'plato2' => $_FILES['imagen_segundo_plato'], 
        'postre' => $_FILES['imagen_postre']
    ];
    
    foreach ($images as $key => $image) {
        if ($image['error'] == 0) {
            if ($image['size'] > $max_size) {
                $error .= 'La imagen ' . $key . ' es demasiado grande. <br>';
            }
            $type = mime_content_type($image['tmp_name']);
            if (!in_array($type, $allowed_types)) {
                $error .= 'El tipo de imagen ' . $key . ' es incorrecto. <br>';
            }
            $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_exts)) {
                $error .= 'La extensión de archivo de ' . $key . ' es incorrecta. <br>';
            }

            if (empty($error)) {
                $destination = $upload_path . $key . '.' . $ext;
                move_uploaded_file($image['tmp_name'], $destination);

                // Redimensiona la imagen
                resize_image_gd($destination, $thumbnail_path . $key . '.' . $ext, 300, 300);
            }
        } else {
            $error .= 'Error al subir la imagen ' . $key . '. <br>';
        }
    }

    if (empty($error)) {
        $message = 'Menú guardado correctamente.<br>';
        $message .= '<h2>MENU RESTAURANTE</h2>';
        $message .= '<h3>Primer Plato</h3>';
        $message .= 'Nombre: ' . htmlspecialchars($nombre_primer_plato) . '<br>';
        $message .= 'Descripción: ' . htmlspecialchars($descripcion_primer_plato) . '<br>';
        $message .= 'Precio: ' . htmlspecialchars($precio_primer_plato). '$' . '<br>';
        $message .= '<img src="' . $thumbnail_path . 'plato1.' . $ext . '" alt="Imagen de ' . htmlspecialchars($nombre_primer_plato) . '"><br>';

        $message .= '<h3>Segundo Plato</h3>';
        $message .= 'Nombre: ' . htmlspecialchars($nombre_segundo_plato) . '<br>';
        $message .= 'Descripción: ' . htmlspecialchars($descripcion_segundo_plato) . '<br>';
        $message .= 'Precio: ' . htmlspecialchars($precio_segundo_plato). '$' . '<br>';
        $message .= '<img src="' . $thumbnail_path . 'plato2.' . $ext . '" alt="Imagen de ' . htmlspecialchars($nombre_segundo_plato) . '"><br>';

        $message .= '<h3>Postre</h3>';
        $message .= 'Nombre: ' . htmlspecialchars($nombre_postre) . '<br>';
        $message .= 'Descripción: ' . htmlspecialchars($descripcion_postre) . '<br>';
        $message .= 'Precio: ' . htmlspecialchars($precio_postre). '$' . '<br>';
        $message .= '<img src="' . $thumbnail_path . 'postre.' . $ext . '" alt="Imagen de ' . htmlspecialchars($nombre_postre) . '"><br>';

        $message .= '<h3>Bebida incluida: ' . $bebida_incluida . '</h3>';
    } else {
        $message = '<b>No se pudo guardar el menú:</b> ' . $error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Día</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<h1>Formulario del Menú del Día</h1>
<?= $message ?>
<form method="POST" action="" enctype="multipart/form-data">
    <h2>Primer Plato</h2>
    <label for="nombre_primer_plato">Nombre:</label>
    <input type="text" name="nombre_primer_plato" required><br>
    <label for="descripcion_primer_plato">Descripción:</label>
    <textarea name="descripcion_primer_plato" required></textarea><br>
    <label for="precio_primer_plato">Precio:</label>
    <input type="number" name="precio_primer_plato" step="0.01" required><br>
    <label for="imagen_primer_plato">Imagen:</label>
    <input type="file" name="imagen_primer_plato" accept="image/*" required><br>

    <h2>Segundo Plato</h2>
    <label for="nombre_segundo_plato">Nombre:</label>
    <input type="text" name="nombre_segundo_plato" required><br>
    <label for="descripcion_segundo_plato">Descripción:</label>
    <textarea name="descripcion_segundo_plato" required></textarea><br>
    <label for="precio_segundo_plato">Precio:</label>
    <input type="number" name="precio_segundo_plato" step="0.01" required><br>
    <label for="imagen_segundo_plato">Imagen:</label>
    <input type="file" name="imagen_segundo_plato" accept="image/*" required><br>

    <h2>Postre</h2>
    <label for="nombre_postre">Nombre:</label>
    <input type="text" name="nombre_postre" required><br>
    <label for="descripcion_postre">Descripción:</label>
    <textarea name="descripcion_postre" required></textarea><br>
    <label for="precio_postre">Precio:</label>
    <input type="number" name="precio_postre" step="0.01" required><br>
    <label for="imagen_postre">Imagen:</label>
    <input type="file" name="imagen_postre" accept="image/*" required><br>

    <h2>Bebida Incluida</h2>
    <label>
        <input type="checkbox" name="bebida_incluida" value="1"> Sí
        <input type="checkbox" name="bebida_incluida" value="0"> No
    </label><br>

    <input type="submit" value="Guardar Menú">
</form>
<?php include 'includes/footer.php'; ?>
</body>
</html>
