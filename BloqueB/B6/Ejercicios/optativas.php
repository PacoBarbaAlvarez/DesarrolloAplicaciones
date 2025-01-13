<?php
$subject = '';
$message = '';
$available_subjects = ['Matemáticas', 'Física', 'Historia', 'Arte'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = $_POST['subject'] ?? '';
    $valid   = in_array($subject, $available_subjects);
    $message = $valid ? "Has seleccionado: $subject" : 'Selecciona una opción válida.';
}
?>
<?php include 'includes/header.php'; ?>

<!-- Mensaje de confirmación o error -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario con un menú desplegable -->
<form action="optativas.php" method="POST">
  <p>Selecciona una asignatura optativa:</p>
  <select name="subject">
      <option value="">-- Selecciona --</option>
      <?php foreach ($available_subjects as $option) { ?>
          <option value="<?= htmlspecialchars($option) ?>" 
              <?= ($subject == $option) ? 'selected' : '' ?>>
              <?= htmlspecialchars($option) ?>
          </option>
      <?php } ?>
  </select>
  <input type="submit" value="Guardar">
</form>

<?php include 'includes/footer.php'; ?>
