<?php
$path = 'img/nologo.png';
?>
<?php include 'includes/header.php'; ?>

<?php if (file_exists($path)) { ?>
  <b>Nombre:</b>      <?= pathinfo($path, PATHINFO_BASENAME) ?><br>
  <b>Tamaño:</b>      <?= filesize($path) ?> bytes<br>
  <b>Tipo MIME:</b>   <?= mime_content_type($path) ?><br>
  <b>Carpeta:</b>    <?= pathinfo($path, PATHINFO_DIRNAME) ?><br>
<?php } else { ?>
  <p>No hay tal archivo.</p>
<?php } ?>

<?php include 'includes/footer.php'; ?>
