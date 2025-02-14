<?php
// Fecha ingresada por el usuario
$user_date = '16/10/2024 15:30:00';

// Convertir a objeto DateTime
$date = DateTime::createFromFormat('d/m/Y H:i:s', $user_date);

// Mostrar en formato Y-m-d H:i:s
echo "<p><b>Fecha en formato Y-m-d H:i:s:</b> " . $date->format('Y-m-d H:i:s') . "</p>";

// Obtener timestamp UNIX
echo "<p><b>Timestamp UNIX:</b> " . $date->getTimestamp() . "</p>";

// Mostrar en formato legible
echo "<p><b>Fecha legible:</b> " . $date->format('d \d\e F \d\e Y, H:i') . "</p>";
?>