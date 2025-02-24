<?php
// Comprobar si existe la cookie 'nombre'
if (isset($_COOKIE['nombre'])) {
    $nombre = $_COOKIE['nombre'];
} else {
    $nombre = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <?php if ($nombre): ?>
        <h1>Bienvenido de nuevo, <?php echo htmlspecialchars($nombre); ?></h1>
    <?php else: ?>
        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>

    <?php
    // Procesar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        setcookie('nombre', $nombre);
        header("Location: welcome.php");
        exit;
    }
    ?>
</body>
</html>