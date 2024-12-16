<?php
$text = 'Total: £444 こんにちは 世界'; // Agregamos caracteres en japonés (こんにちは 世界)

?>
<?php include 'includes/header.php'; ?>

<p>
  <b>Character count using <code>strlen()</code>:</b>
  <?= strlen($text) ?><br>
  <b>Character count using <code>mb_strlen()</code>:</b>
  <?= mb_strlen($text, 'UTF-8') ?><br>
  <b>First match of '444' using <code>strpos()</code>:</b>
  <?= strpos($text, '444') ?><br>
  <b>First match of '444' using <code>mb_strpos()</code>:</b>
  <?= mb_strpos($text, '444', 0, 'UTF-8') ?><br>
</p>

<?php include 'includes/footer.php'; ?>
