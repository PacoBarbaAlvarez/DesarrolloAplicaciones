<?php
// Inicializar variables
$nombre = '';
$correo = '';
$telefono = '';
$tipo_evento = '';
$acepta_terminos = false;
$errores = [];
$mensaje_exito = '';

// Validar y procesar datos cuando el formulario se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $tipo_evento = filter_input(INPUT_POST, 'tipo_evento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $acepta_terminos = filter_input(INPUT_POST, 'acepta_terminos', FILTER_VALIDATE_BOOLEAN);

    // Validar nombre
    if (empty($nombre) || !preg_match("/^[a-zA-Z\s]{2,50}$/", $nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio, debe contener solo letras y tener entre 2 y 50 caracteres.';
    }

    // Validar correo
    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = 'Debe proporcionar un correo electrónico válido.';
    }

    // Validar teléfono
    if (empty($telefono) || !preg_match("/^\d{9,}$/", $telefono)) {
        $errores['telefono'] = 'El teléfono es obligatorio y debe contener al menos 9 dígitos.';
    }

    // Validar tipo de evento
    $tipos_validos = ['Presencial', 'Online'];
    if (empty($tipo_evento) || !in_array($tipo_evento, $tipos_validos)) {
        $errores['tipo_evento'] = 'Debe seleccionar un tipo de evento válido.';
    }

    // Validar aceptación de términos
    if (!$acepta_terminos) {
        $errores['acepta_terminos'] = 'Debe aceptar los términos y condiciones.';
    }

    // Si no hay errores, procesar los datos
    if (empty($errores)) {
        // Simular almacenamiento en base de datos
        $mensaje_exito = 'Registro exitoso. Sus datos han sido procesados correctamente.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Registro de Eventos</h1>

<form action="" method="POST">
    <label for="nombre">Nombre completo:</label>
    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>">
    <?php if (!empty($errores['nombre'])): ?>
        <small style="color: red;"><?= $errores['nombre'] ?></small>
    <?php endif; ?>
    <br><br>

    <label for="correo">Correo electrónico:</label>
    <input type="text" name="correo" id="correo" value="<?= htmlspecialchars($correo) ?>">
    <?php if (!empty($errores['correo'])): ?>
        <small style="color: red;"><?= $errores['correo'] ?></small>
    <?php endif; ?>
    <br><br>

    <label for="telefono">Teléfono de contacto:</label>
    <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($telefono) ?>">
    <?php if (!empty($errores['telefono'])): ?>
        <small style="color: red;"><?= $errores['telefono'] ?></small>
    <?php endif; ?>
    <br><br>

    <label for="tipo_evento">Tipo de evento:</label>
    <select name="tipo_evento" id="tipo_evento">
        <option value="">Seleccione...</option>
        <option value="Presencial" <?= $tipo_evento === 'Presencial' ? 'selected' : '' ?>>Presencial</option>
        <option value="Online" <?= $tipo_evento === 'Online' ? 'selected' : '' ?>>Online</option>
    </select>
    <?php if (!empty($errores['tipo_evento'])): ?>
        <small style="color: red;"><?= $errores['tipo_evento'] ?></small>
    <?php endif; ?>
    <br><br>

    <label>
        <input type="checkbox" name="acepta_terminos" value="1" <?= $acepta_terminos ? 'checked' : '' ?>>
        Acepto los términos y condiciones
    </label>
    <?php if (!empty($errores['acepta_terminos'])): ?>
        <small style="color: red;"><?= $errores['acepta_terminos'] ?></small>
    <?php endif; ?>
    <br><br>

    <input type="submit" value="Registrar">
</form>

<?php if ($mensaje_exito): ?>
    <p style="color: green;"><?= $mensaje_exito ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
