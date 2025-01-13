<?php
declare(strict_types=1); // Habilitar tipos estrictos
require 'includes/validate.php'; // Funciones de validación

$user = [
    'email'      => '',
    'age'        => '',
    'newsletter' => '',
]; // Inicializar el array $user

$errors = [
    'email'      => '',
    'age'        => '',
    'newsletter' => '',
]; // Inicializar el array de errores

$message = ''; // Inicializar el mensaje

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el formulario fue enviado
    $user['email']      = $_POST['email']; // Obtener el correo electrónico
    $user['age']        = $_POST['age']; // Obtener la edad
    $user['newsletter'] = isset($_POST['newsletter']) ? true : false; // Obtener el consentimiento para el boletín

    // Validar los datos
    $errors['email']      = filter_var($user['email'], FILTER_VALIDATE_EMAIL) ? '' : 'Correo electrónico no válido';
    $errors['age']        = is_number($user['age'], 18, 100) ? '' : 'La edad debe estar entre 18 y 100 años';
    $errors['newsletter'] = $user['newsletter'] ? '' : 'Debe confirmar que desea recibir boletines';

    $invalid = implode($errors); // Unir los mensajes de error
    if ($invalid) { // Si hay errores
        $message = 'Por favor, corrija los siguientes errores:'; // No procesar
    } else { // De lo contrario
        $message = 'Sus datos son válidos. ¡Gracias por registrarse!'; // Procesar los datos
        // Guardar datos o procesarlos según sea necesario
    }
}
?>
<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario de registro -->
<form action="validate-form.php" method="POST">
  Correo electrónico: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
  <span class="error"><?= htmlspecialchars($errors['email']) ?></span><br>

  Edad: <input type="text" name="age" value="<?= htmlspecialchars($user['age']) ?>">
  <span class="error"><?= htmlspecialchars($errors['age']) ?></span><br>

  <input type="checkbox" name="newsletter" value="true" <?= $user['newsletter'] ? 'checked' : '' ?>>
  Deseo recibir boletines
  <span class="error"><?= htmlspecialchars($errors['newsletter']) ?></span><br>

  <input type="submit" value="Registrarse">
</form>

<?php include 'includes/footer.php'; ?>
