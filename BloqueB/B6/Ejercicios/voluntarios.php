<?php
declare(strict_types=1);

// Lista de eventos disponibles
$eventos = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura'];

$seleccionados = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $seleccionados = $_POST['eventos'] ?? [];
    
    if (empty($seleccionados)) {
        $message = 'Debes seleccionar al menos un evento.';
    } else {
        $message = 'Gracias por inscribirte en los siguientes eventos: ' . implode(', ', $seleccionados);
    }
}
?>
<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje de confirmación o error -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario de inscripción de voluntarios -->
<form action="voluntarios.php" method="POST">
  <p>Selecciona los eventos en los que deseas participar:</p>
  <?php foreach ($eventos as $evento) { ?>
      <label>
          <input type="checkbox" name="eventos[]" value="<?= htmlspecialchars($evento) ?>"
                 <?= in_array($evento, $seleccionados) ? 'checked' : '' ?>>
          <?= htmlspecialchars($evento) ?>
      </label><br>
  <?php } ?>
  <input type="submit" value="Guardar">
</form>

<?php include 'includes/footer.php'; ?>
