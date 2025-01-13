<?php include 'includes/header.php'; ?>

<?php
// Verificar si el formulario ha sido enviado
if ($_GET['sent'] ?? '' === 'register') {
    // Recoger y procesar los datos del formulario
    $nombre = htmlspecialchars($_GET['nombre'] ?? '');
    $apellido = htmlspecialchars($_GET['apellido'] ?? '');
    $edad = htmlspecialchars($_GET['edad'] ?? '');
    $posicion = htmlspecialchars($_GET['posicion'] ?? '');
    $email = htmlspecialchars($_GET['email'] ?? '');
    $telefono = htmlspecialchars($_GET['telefono'] ?? '');

    echo "<h1>Registro completado</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellido: $apellido</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Posición: $posicion</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Teléfono: $telefono</p>";
} else {
    // Mostrar el formulario de registro
    ?>
    <h1>Registro en el Club de Fútbol</h1>
    <form action="registro.php" method="GET">
        <p>Nombre: <input type="text" name="nombre" required></p>
        <p>Apellido: <input type="text" name="apellido" required></p>
        <p>Edad: <input type="number" name="edad" required></p>
        <p>Posición: 
            <select name="posicion">
                <option value="Delantero">Delantero</option>
                <option value="Centrocampista">Centrocampista</option>
                <option value="Defensa">Defensa</option>
                <option value="Portero">Portero</option>
            </select>
        </p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Teléfono: <input type="tel" name="telefono"></p>
        <p><input type="submit" name="sent" value="register"></p>
    </form>
    <?php
}
?>

<?php include 'includes/footer.php'; ?>
