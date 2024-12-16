<?php
// Definición de constantes
define('RED_SOCIAL', 'Mi Red Social de Intereses');

// Definición de lista de intereses predefinidos
$intereses = [
    'Lectura', 
    'Correr', 
    'Cocina', 
    'Viajar', 
    'Fotografía'
];

// Función para mostrar intereses como una cadena separada por comas
function mostrarIntereses($intereses) {
    return implode(', ', $intereses);
}

// Función para agregar un nuevo interés
function agregarInteres(&$intereses, $nuevoInteres) {
    array_push($intereses, $nuevoInteres);
}

// Función para numerar intereses con identificadores aleatorios
function numerarIntereses($intereses) {
    $numeros = range(1, count($intereses));
    shuffle($numeros); // Mezcla los números aleatoriamente
    return array_combine($numeros, $intereses);
}

// Simulación de agregar un nuevo interés (usando un formulario o input del usuario)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nuevo_interes'])) {
    $nuevoInteres = trim($_POST['nuevo_interes']);
    if (!empty($nuevoInteres)) {
        agregarInteres($intereses, $nuevoInteres);
        header("Location: thank_you.php");
        exit();
    }
}
?>
<?php include 'includes/header.php'; ?>

<h1><?= RED_SOCIAL ?></h1>

<p><b>Intereses actuales:</b> <?= mostrarIntereses($intereses) ?></p>

<form method="POST" action="">
    <input type="text" name="nuevo_interes" placeholder="Agregar un nuevo interés">
    <button type="submit">Agregar</button>
</form>

<h2>Intereses Numerados:</h2>
<?php
$numerosIntereses = numerarIntereses($intereses);
foreach ($numerosIntereses as $numero => $interes) {
    echo "<b>$numero</b>: $interes<br>";
}
?>

<?php include 'includes/footer.php'; ?>
