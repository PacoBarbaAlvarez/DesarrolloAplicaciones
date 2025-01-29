
<?php
// Verificar si el formulario ha sido enviado
if ($_GET['sent'] ?? '' === 'enviar') {
    // Recoger y procesar los datos del formulario
    $nombre = htmlspecialchars($_GET['nombre'] ?? '');
    $correo = htmlspecialchars($_GET['correo'] ?? '');
    $edad = htmlspecialchars($_GET['edad'] ?? '');
    $tipo = htmlspecialchars($_GET['tipo'] ?? '');
    $politica = htmlspecialchars($_GET['politica'] ?? '');

    echo "<h1>Registro completado</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Correo: $nombre</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Tipo de Libro: $tipo</p>";
    
} else {
    // Mostrar el formulario de registro
    ?>
    <h1>Biblioteca</h1>
    <form method="GET" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="correo">Correo: </label>
        <input type= "text" name "correo" id="correo" required>
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
        Acepto los terminos y condiciones.
        </p>

        <p><input type="submit" name="sent" value="enviar"></p>
    </form>
    <?php
}
?>