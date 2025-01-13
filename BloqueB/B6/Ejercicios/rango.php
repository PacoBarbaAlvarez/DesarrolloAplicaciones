<?php
declare(strict_types = 1);

$age     = '';
$message = '';
function is_number($number, int $min = 0, int $max = 100): bool
{
    return ($number >= $min && $number <= $max);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $age = $_POST['age'];

    // Validar si la entrada es un número válido y está en el rango [8-16]
    if (is_numeric($age)) {
        $valid = is_number((int)$age, 8, 16);
        if ($valid) {
            $message = 'Age is valid';
        } else {
            $message = 'Error: Age must be between 8 and 16.';
        }
    } else {
        $message = 'Error: Please enter a valid number.';
    }
}
?>
<?php include 'includes/header.php'; ?>

<!-- Mensaje de error o confirmación -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario para introducir la edad -->
<form action="rango.php" method="POST">
  Age: <input type="text" name="age" size="4"
              value="<?= htmlspecialchars($age) ?>"> 
  <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
