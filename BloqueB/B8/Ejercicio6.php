<?php
// Zonas horarias
$timezone_ldn = new DateTimeZone('Europe/London');
$timezone_nyc = new DateTimeZone('America/New_York');
$timezone_tokyo = new DateTimeZone('Asia/Tokyo');

// Fecha y hora en Londres
$date_ldn = new DateTime('now', $timezone_ldn);
echo "<p><b>Hora en Londres:</b> " . $date_ldn->format('Y-m-d H:i:s') . "</p>";

// Convertir a Nueva York
$date_nyc = clone $date_ldn;
$date_nyc->setTimezone($timezone_nyc);
echo "<p><b>Hora en Nueva York:</b> " . $date_nyc->format('Y-m-d H:i:s') . "</p>";

// Convertir a Tokio
$date_tokyo = clone $date_ldn;
$date_tokyo->setTimezone($timezone_tokyo);
echo "<p><b>Hora en Tokio:</b> " . $date_tokyo->format('Y-m-d H:i:s') . "</p>";

// Información de la zona horaria de Londres
$location = $timezone_ldn->getLocation();
echo "<p><b>Zona horaria de Londres:</b> " . $timezone_ldn->getName() . "</p>";
echo "<p><b>Latitud:</b> " . $location['latitude'] . "</p>";
echo "<p><b>Longitud:</b> " . $location['longitude'] . "</p>";
?>