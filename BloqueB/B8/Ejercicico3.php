<?php
// Fecha y hora inicial
$event_date = new DateTime('2024-10-16 15:30:00');

// Cambiar la fecha
$event_date->setDate(2024, 11, 1); // Cambiar a 1 de noviembre de 2024

// Cambiar la hora
$event_date->setTime(18, 0); // Cambiar a las 18:00

// Ajustar usando modify
$event_date->modify('+2 hours 15 minutes'); // Sumar 2 horas y 15 minutos

// Mostrar la fecha ajustada
echo "<p><b>Fecha ajustada:</b> " . $event_date->format('Y-m-d H:i:s') . "</p>";
?>