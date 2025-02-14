<?php
// Fecha de inicio y fin del período
$start_date = new DateTime('2025-01-01');
$end_date = new DateTime('2025-03-01');

// Intervalo de repetición (cada 7 días)
$interval = new DateInterval('P7D');

// Crear el período
$period = new DatePeriod($start_date, $interval, $end_date);

// Mostrar las fechas de los eventos recurrentes
echo "<h3>Eventos recurrentes:</h3>";
foreach ($period as $event) {
    echo "<p>" . $event->format('l, d M Y') . "</p>";
}
?>