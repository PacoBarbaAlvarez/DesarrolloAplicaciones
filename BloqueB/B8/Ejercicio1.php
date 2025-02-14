<?php
// Fecha actual del sistema
$current_time = time();
$current_date = date('Y-m-d H:i:s', $current_time);
echo "<p><b>Fecha actual:</b> $current_date</p>";

// Fechas del evento
$start_event = strtotime('2024-01-15 09:00:00'); // Fecha de inicio (futura)
$end_event = mktime(18, 0, 0, 1, 20, 2024); // Fecha de finalización

// Convertir a formato legible
$start_event_date = date('Y-m-d H:i:s', $start_event);
$end_event_date = date('Y-m-d H:i:s', $end_event);

echo "<p><b>Evento inicia:</b> $start_event_date</p>";
echo "<p><b>Evento termina:</b> $end_event_date</p>";

// Calcular días restantes
$days_until_start = floor(($start_event - $current_time) / (60 * 60 * 24));
$days_until_end = floor(($end_event - $current_time) / (60 * 60 * 24));

// Mensajes condicionales
if ($current_time < $start_event) {
    echo "<p>Faltan $days_until_start días para que comience el evento.</p>";
} elseif ($current_time >= $start_event && $current_time <= $end_event) {
    echo "<p>El evento está en curso. Faltan $days_until_end días para que termine.</p>";
} else {
    echo "<p>El evento ha concluido.</p>";
}
?>