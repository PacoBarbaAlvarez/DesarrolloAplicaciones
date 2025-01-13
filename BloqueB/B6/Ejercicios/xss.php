<?php
function html_escape(string $string): string
{
    // Escapar caracteres especiales para prevenir XSS
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
}

// Obtener el mensaje de la cadena de consulta
$message = $_GET['msg'] ?? 'No message provided.';
?>
<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaping Example</title>
</head>
<body>
    <h1>Escaped Message</h1>
    <p>Below is the escaped message:</p>
    <p><?= html_escape($message) ?></p>
    <p><a href="index2.php">Go back</a></p>
</body>
</html>

<?php include 'includes/footer.php' ?>
