<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger y procesar los datos del formulario sin usar filters
    $nombre   = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $correo   = htmlspecialchars(trim($_POST['correo'] ?? ''));
    $edad     = htmlspecialchars(trim($_POST['edad'] ?? ''));
    $tipo     = htmlspecialchars(trim($_POST['tipo'] ?? ''));
    $politica = isset($_POST['politica']) && $_POST['politica'] === 'true';

    // Validaciones manuales
    $errores = [];
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (!strpos($correo, '@') || !strpos($correo, '.')) {
        $errores[] = "El correo no es válido.";
    }
    if (!is_numeric($edad) || $edad < 18 || $edad > 120) {
        $errores[] = "La edad debe ser un número entre 18 y 120.";
    }
    if (!$politica) {
        $errores[] = "Debe aceptar los términos y condiciones.";
    }

    // Mostrar errores o datos procesados
    if (empty($errores)) {
        echo "<h1>Registro completado</h1>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Edad: $edad</p>";
        echo "<p>Tipo de Libro: $tipo</p>";
    } else {
        echo "<h1>Errores en el formulario:</h1>";
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    // Mostrar el formulario de registro
    ?>
    <h1>Biblioteca</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="correo" required>
        <br><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required>
        <br><br>
        <p>Tipo de Libro: 
            <select name="tipo">
                <option value="Digital">Digital</option>
                <option value="Fisico">Fisico</option>
            </select>
        </p>
        <p><input type="checkbox" name="politica" value="true" required> 
        Acepto los términos y condiciones.
        </p>

        <p><input type="submit" value="Enviar"></p>
    </form>
    <?php
}
?>
