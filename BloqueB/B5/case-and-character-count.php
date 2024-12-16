<?php
$text = 'Home sweet home';

// Transformaciones básicas
$uppercaseText = strtoupper($text);
$capitalizedText = ucwords($text);
$totalCharacters = strlen($text);
$totalWords = str_word_count($text);

// Calcular la longitud del texto sin contar los espacios
$charactersWithoutSpaces = strlen(str_replace(' ', '', $text));

// Función adicional: Contar la frecuencia de cada palabra
function wordFrequency($text) {
    $words = str_word_count(strtolower($text), 1); 
    $frequency = array_count_values($words);
    arsort($frequency); 
    return $frequency;
}

$wordFrequencies = wordFrequency($text);

// Función adicional: Detectar palabras clave
function highlightKeywords($text, $keywords) {
    foreach ($keywords as $keyword) {
        $text = preg_replace("/\b($keyword)\b/i", '<b style="color:red;">$1</b>', $text);
    }
    return $text;
}

$keywords = ['important', 'process', 'learning'];
$highlightedText = highlightKeywords($text, $keywords);

// Función adicional: Generar resumen de las primeras 50 palabras
function summarizeText($text, $wordLimit = 50) {
    $words = explode(' ', $text);
    return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
}

$summary = summarizeText($text);
?>


<?php include 'includes/header.php'; ?>
<p>
  <b>Original Text:</b> <?= $text ?><br>
  <b>Uppercase:</b> <?= $uppercaseText ?><br>
  <b>Capitalized Text:</b> <?= $capitalizedText ?><br>
  <b>Character Count:</b> <?= $totalCharacters ?><br>
  <b>Character Count (without spaces):</b> <?= $charactersWithoutSpaces ?><br>
  <b>Word Count:</b> <?= $totalWords ?><br>
</p>

<p><b>Word Frequencies:</b></p>
<ul>
  <?php foreach ($wordFrequencies as $word => $count): ?>
      <li><?= $word ?>: <?= $count ?></li>
  <?php endforeach; ?>
</ul>

<p>
  <b>Text with Highlighted Keywords:</b><br>
  <?= $highlightedText ?>
</p>
<p>
  <b>Summary (First 50 Words):</b><br>
  <?= $summary ?>
</p>

<?php include 'includes/footer.php'; ?>
