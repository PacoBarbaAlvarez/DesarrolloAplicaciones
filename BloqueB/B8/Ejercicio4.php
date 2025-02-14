<?php
// Fechas de inicio y fin del evento
$start_event = new DateTime('2024-01-15 09:00:00');
$end_event = new DateTime('2024-01-17 18:00:00');

// Calcular la diferencia
$interval = $start_event->diff($end_event);

// Mostrar la duración
echo "<p>Duración del evento: " . $interval->format('%d días, %h horas, %i minutos') . "</p>";

// Calcular el total de horas
$total_hours = ($interval->days * 24) + $interval->h + ($interval->i / 60);
echo "<p>Total de horas: $total_hours horas</p>";
?>