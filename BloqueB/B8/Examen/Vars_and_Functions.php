<?php
$message = '';
$message_error = '';
$fecha = [
    'fecha_inicio' => '',
    'fecha_fin' => '',
];
$error = [
    'fecha_inicio' => '',
    'fecha_fin' => '',
    'frecuencia' => '',
];

$opciones_validas = ["diaria", "semanal", "dos-semanas", "mensual"];
$frecuencia = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters['fecha_inicio']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_inicio']['options']['regexp'] = '/[0-9\/\:\s]/';
    $filters['fecha_fin']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_fin']['options']['regexp'] = '/[0-9\/\:\s]/';

    $fecha = filter_input_array(INPUT_POST, $filters);

    if (isset($_POST["frecuencia"]) && in_array($_POST["frecuencia"], $opciones_validas)) {
        $frecuencia = $_POST["frecuencia"];
    }

    $error = [
        'fecha_inicio' => ($fecha['fecha_inicio']) ? '' : 'Error en la fecha de inicio',
        'fecha_fin' => ($fecha['fecha_fin']) ? '' : 'Error en la fecha de finalización',
        'frecuencia' => ($frecuencia !== '' && in_array($frecuencia, $opciones_validas)) ? '' : 'Error en la frecuencia seleccionada'
    ];

    $invalid = implode($error);

    if ($invalid) {
        $message_error = 'Debes solucionar los errores.';
    } else {
        $zonas = [
            'Europe/Madrid' => 'Madrid',
            'America/Los_Angeles' => 'Los Ángeles',
            'Europe/London' => 'Londres',
            'Asia/Tokyo' => 'Tokio',
        ];

        // Crear objeto DateTimeZone con la zona horaria seleccionada
        $timezone = new DateTimeZone('Europe/Madrid');
        $fecha_inicio = DateTime::createFromFormat('d/m/Y H:i:s', $fecha['fecha_inicio'], $timezone);
        $fecha_fin = DateTime::createFromFormat('d/m/Y H:i:s', $fecha['fecha_fin'], $timezone);

        // Crear un intervalo según la frecuencia seleccionada
        switch ($frecuencia) {
            case 'diaria':
                $interval = new DateInterval('P1D');
                break;
            case 'semanal':
                $interval = new DateInterval('P1W');
                break;
            case 'dos-semanas':
                $interval = new DateInterval('P2W');
                break;
            case 'mensual':
                $interval = new DateInterval('P1M');
                break;
        }

        // Crear un periodo de reuniones
        $period = new DatePeriod($fecha_inicio, $interval, $fecha_fin);

        // Mostrar horarios en otras zonas
        $message .= "<h4>Horarios en otras zonas</h4>";
        foreach ($zonas as $zona => $nombre) {
            $message .= "<h5>Zona: $nombre</h5>";
            foreach ($period as $fecha_reunion) {
                $fecha_reunion->setTimezone(new DateTimeZone($zona));
                $offset_utc = $fecha_reunion->getOffset() / 3600; // Obtener el offset en horas
                $message .= "<p><b>Reunión:</b> " . $fecha_reunion->format('d/m/Y H:i:s') . " (UTC " . ($offset_utc >= 0 ? '+' : '') . $offset_utc . ")</p>";

                // Calcular el tiempo restante hasta la reunión
                $now = new DateTime('now', new DateTimeZone($zona));
                $tiempo_restante = $fecha_reunion->diff($now);
                $message .= "<p><b>Tiempo restante:</b> " . $tiempo_restante->format('%d días, %h horas, %i minutos') . "</p>";
            }
        }

        // Muestra de resultados
        $message .= "<h3>Resultados del Análisis</h3>";
        $message .= "<p><b>Fecha de inicio:</b> " . $fecha_inicio->format('d/m/Y H:i:s') . "</p>";
        $message .= "<p><b>Fecha de finalización:</b> " . $fecha_fin->format('d/m/Y H:i:s') . "</p>";
        $message .= "<p><b>Zona Horaria:</b> " . $fecha_inicio->getTimezone()->getName() . "</p>";
    }
}
?>


