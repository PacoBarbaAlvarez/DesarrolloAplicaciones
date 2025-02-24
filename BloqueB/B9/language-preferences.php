<?php
// Comprobar si existe la cookie 'idioma'
if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
} else {
    $idioma = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preferencias de Idioma</title>
</head>
<body>
    <?php if ($idioma): ?>
        <?php if ($idioma == 'es'): ?>
            <h1>Bienvenido! Has seleccionado español.</h1>
        <?php elseif ($idioma == 'en'): ?>
            <h1>Welcome! You have selected English.</h1>
        <?php endif; ?>
    <?php else: ?>
        <form method="post" action="">
            <label for="idioma">Selecciona tu idioma:</label>
            <select id="idioma" name="idioma">
                <option value="es">Español</option>
                <option value="en">English</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>

    <?php
    // Procesar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idioma = $_POST['idioma'];
        setcookie('idioma', $idioma, time() + (86400 * 30)); // 30 días
        header("Location: language-preferences.php");
        exit;
    }
    ?>
</body>
</html>