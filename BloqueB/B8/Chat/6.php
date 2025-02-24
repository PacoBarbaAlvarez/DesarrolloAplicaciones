<?php
// Fecha inicial del evento
$fecha = new DateTime("2025-01-01 10:00:00", new DateTimeZone("Europe/Madrid"));

// Convertir a otras zonas horarias
$zonas = ["America/New_York", "Asia/Tokyo", "Australia/Sydney"];

echo "<h2>Fecha en diferentes zonas horarias:</h2>";
foreach ($zonas as $zona) {
    $fecha->setTimezone(new DateTimeZone($zona));
    echo "Zona: " . $zona . "<br>";
    echo "Fecha: " . $fecha->format('d/m/Y H:i:s') . "<br>";
    echo "Offset UTC: " . ($fecha->getOffset() / 3600) . " horas<br><br>";
}
?>