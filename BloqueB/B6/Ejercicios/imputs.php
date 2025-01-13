<?php
// Inicializar valores de los campos
$form['email'] = '';
$form['age'] = '';
$form['url'] = '';
$form['terms'] = '';

// Validar inputs si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configurar filtros
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL,                    // Validar email
        'age' => [
            'filter' => FILTER_VALIDATE_INT,                 // Validar entero
            'options' => ['min_range' => 18, 'max_range' => 65], // Rango 18-65
        ],
        'url' => FILTER_VALIDATE_URL,                        // Validar URL
        'terms' => FILTER_VALIDATE_BOOLEAN,                  // Validar checkbox
    ];

    // Aplicar filtros
    $form = filter_input_array(INPUT_POST, $filters);

    // Validar aceptación de términos y condiciones
    if (!$form['terms']) {
        $form['terms'] = 'Debe aceptar los términos y condiciones.';
    }
}
?>
<?php include 'includes/header.php'; ?>

<h1>Formulario con Validación de Múltiples Inputs</h1>
<p>Complete los campos y envíe el formulario para validar los datos ingresados.</p>

<form action="imputs.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Edad (18-65): <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  URL: <input type="text" name="url" value="<?= htmlspecialchars($form['url']) ?>"><br>
  Acepto los términos y condiciones: 
  <input type="checkbox" name="terms" value="1" <?= ($form['terms'] === true) ? 'checked' : '' ?>><br>
  <input type="submit" value="Guardar">
</form>

<h2>Resultados de la Validación</h2>
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
