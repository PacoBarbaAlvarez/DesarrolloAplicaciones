<?php
$usuario = [
    "nombre" => "",
    "edad" => "",
    "correo" => "",
    "tipo" => "",
    "politica" =>""
]; 

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // SANEAMIENTO DE LOS DATOS
    $datos = filter_input_array(INPUT_POST, [
        "nombre" => FILTER_SANITIZE_FULL_SPECIAL_CHARS, // Convierte caracteres especiales en entidades HTML para evitar XSS.
        "edad" => FILTER_SANITIZE_NUMBER_INT, // Verifica si un valor es un número entero. Puede aceptar opciones de rango.
        "correo" => FILTER_SANITIZE_EMAIL, //  Limpia una cadena para que sea un formato válido de correo electrónico.
        "tipo" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "politica" => FILTER_VALIDATE_BOOLEAN // Verifica si un valor es un booleano (true/false). Acepta "true", "false", "1", "0", "on", "off" (insensible a mayúsculas).
    ]);

    $usuario["nombre"] = $datos["nombre"];
    $usuario["edad"] = $datos["edad"];
    $usuario["correo"] = $datos["correo"];
    $usuario["tipo"] = $datos["tipo"];
    $usuario["politica"] = $datos["politica"];

    // VALIDACIÓN DE LOS DATOS
    if (empty($usuario["nombre"])) {
        $errores["nombre"] = "El nombre no puede estar vacío.";
    }

    if (!is_numeric($usuario["edad"]) || $usuario["edad"] < 18 || $usuario["edad"] > 120) {
        $errores["edad"] = "La edad debe ser un número entre 18 y 120.";
    }


    if (empty($usuario["correo"]) || !filter_var($usuario["correo"], FILTER_VALIDATE_EMAIL)) {
        $errores["correo"] = "El correo no puede estar vacío o tiene un formato no válido.";
    }

    if (!$usuario["politica"]) {
        $errores["politica"] = "Debe aceptar los términos y condiciones.";
    }

    // Mostrar errores o datos procesados
    if (empty($errores)) {
        echo "<ul>
            <li><strong>Nombre:</strong> {$usuario['nombre']}</li>
            <li><strong>Correo:</strong> {$usuario['correo']}</li>
            <li><strong>Edad:</strong> {$usuario['edad']}</li>
            <li><strong>Tipo de Libro:</strong> {$usuario['tipo']}</li>
        </ul>";
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