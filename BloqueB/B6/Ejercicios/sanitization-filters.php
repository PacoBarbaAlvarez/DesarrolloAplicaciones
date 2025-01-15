<?php
// Inicializar variables
$nombre = '';
$correo = '';
$telefono = '';
$mensaje = '';
$datos_saneados = [];

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos crudos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    // Definir filtros de saneamiento
    $filtros = [
        'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, // Sanea el nombre (escapa caracteres HTML)
        'correo' => FILTER_SANITIZE_EMAIL,             // Sanea el correo electrónico
        'telefono' => FILTER_SANITIZE_NUMBER_INT,      // Sanea el número de teléfono
        'mensaje' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, // Sanea el mensaje (escapa caracteres HTML)
    ];

    // Aplicar filtros
    $datos_saneados = filter_var_array([
        'nombre' => $nombre,
        'correo' => $correo,
        'telefono' => $telefono,
        'mensaje' => $mensaje,
    ], $filtros);
}
?>

<?php include 'includes/header.php'; ?>

<h1>Formulario de Contacto</h1>

<form action="" method="POST">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>"><br><br>

  <label for="correo">Correo electrónico:</label>
  <input type="text" name="correo" id="correo" value="<?= htmlspecialchars($correo) ?>"><br><br>

  <label for="telefono">Teléfono:</label>
  <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($telefono) ?>"><br><br>

  <label for="mensaje">Mensaje:</label><br>
  <textarea name="mensaje" id="mensaje" rows="5" cols="30"><?= htmlspecialchars($mensaje) ?></textarea><br><br>

  <input type="submit" value="Enviar">
</form>

<h2>Datos Saneados</h2>
<pre><?php var_dump($datos_saneados); ?></pre>

<?php include 'includes/footer.php'; ?>
