<?php
include 'includes/header.php'; 
// 1. Simulación de datos de entrada de usuario
$nombre = "   Paco Barba   ";
$correo = "  PACO@DOMAIN.COM  ";
$mensaje = "Este mensaje es urgente. Por favor, procesa urgente la solicitud.";

// 2. Mostrar los datos originales
echo "<h2>Datos Originales:</h2>";
echo "<b>Nombre:</b> '$nombre'<br>";
echo "<b>Correo:</b> '$correo'<br>";
echo "<b>Mensaje:</b> '$mensaje'<br>";

// 3. Operaciones de Manipulación de Cadenas
// Eliminar espacios adicionales
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// Convertir correo a minúsculas
$correo = strtolower($correo);

// Reemplazar palabras inapropiadas
$mensaje = str_replace("urgente", "****", $mensaje);

// Reemplazo insensible a mayúsculas/minúsculas
$mensaje = str_ireplace("urgente", "Prioridad Alta", $mensaje);

// Añadir énfasis al mensaje
$mensaje .= str_repeat("!!!", 3);

// 4. Mostrar los datos procesados
echo "<h2>Datos Procesados:</h2>";
echo "<b>Nombre:</b> '$nombre'<br>";
echo "<b>Correo:</b> '$correo'<br>";
echo "<b>Mensaje:</b> '$mensaje'<br>";
include 'includes/footer.php'; 
?>
