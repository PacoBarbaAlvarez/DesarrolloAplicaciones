<?php
// Inicializar las variables del formulario y los datos validados
$form = [
    'email' => '',
    'age' => '',
    'terms' => 0,
];
$data = []; // Datos validados

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configurar los filtros para cada variable
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL,                    // Validar email
        'age' => [
            'filter' => FILTER_VALIDATE_INT,                 // Validar como entero
            'options' => ['min_range' => 16, 'max_range' => 65], // Rango de edad 16-65
        ],
        'terms' => FILTER_VALIDATE_BOOLEAN,                 // Validar checkbox como booleano
    ];

    // Obtener todos los valores del formulario
    $form = filter_input_array(INPUT_POST);                 // Capturar valores enviados

    // Validar los datos utilizando los filtros configurados
    $data = filter_var_array($form, $filters);              // Aplicar filtros a los valores
}
?>
<?php include 'includes/header.php'; ?>

<h1>Validando Datos en Variables</h1>
<p>Complete el formulario y envíelo para validar las variables.</p>

<form action="validate-variables.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Edad (16-65): <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  Acepto los términos y condiciones: 
  <input type="checkbox" name="terms" value="1" <?= ($form['terms'] ? 'checked' : '') ?>><br>
  <input type="submit" value="Guardar">
</form>

<h2>Resultados de Validación</h2>
<pre><?php var_dump($data); ?></pre>

<?php include 'includes/footer.php'; ?>
