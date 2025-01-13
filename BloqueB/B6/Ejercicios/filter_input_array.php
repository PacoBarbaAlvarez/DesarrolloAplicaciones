<?php
declare(strict_types=1);

$form = filter_input_array(INPUT_POST, [
    'email'      => FILTER_VALIDATE_EMAIL,    // Validar que el correo electrónico sea válido
    'age'        => FILTER_VALIDATE_INT,      // Validar que la edad sea un entero
    'newsletter' => FILTER_SANITIZE_STRING,   // Sanitizar el valor del newsletter (checkbox)
]);

$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el formulario fue enviado
    // Validar correo electrónico
    if (!$form['email']) {
        $errors['email'] = 'El correo electrónico no es válido.';
    }

    // Validar edad
    if ($form['age'] === null || $form['age'] === false || $form['age'] < 18 || $form['age'] > 100) {
        $errors['age'] = 'La edad debe estar entre 18 y 100 años.';
    }

    // Validar interés en recibir boletines
    if (!isset($_POST['newsletter']) || $_POST['newsletter'] !== 'true') {
        $errors['newsletter'] = 'Debe confirmar su interés en recibir boletines.';
    }

    if (empty($errors)) {
        $message = '¡Registro exitoso! Gracias por proporcionar sus datos.';
    } else {
        $message = 'Por favor, corrija los errores en el formulario.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario de registro -->
<form action="filter_input_array.php" method="POST">
  Correo electrónico: <input type="text" name="email" value="<?= htmlspecialchars($form['email'] ?? '') ?>">
  <span class="error"><?= $errors['email'] ?? '' ?></span><br>

  Edad: <input type="text" name="age" value="<?= htmlspecialchars($form['age'] ?? '') ?>">
  <span class="error"><?= $errors['age'] ?? '' ?></span><br>

  <input type="checkbox" name="newsletter" value="true" <?= isset($form['newsletter']) && $form['newsletter'] === 'true' ? 'checked' : '' ?>>
  Deseo recibir boletines
  <span class="error"><?= $errors['newsletter'] ?? '' ?></span><br>

  <input type="submit" value="Registrarse">
</form>

<!-- Mostrar el array de datos enviados -->
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
