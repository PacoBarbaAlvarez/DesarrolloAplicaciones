<?php
// Configuración inicial
date_default_timezone_set('UTC');

// Procesamos el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos los datos enviados
    $endDateInput = $_POST['end_date'] ?? '';
    $selectedTimezone = $_POST['timezone'] ?? 'UTC';
    $recurrence = $_POST['recurrence'] ?? 'weekly'; // Valor por defecto: semanal

    try {
        // Creamos el objeto DateTimeZone según la zona seleccionada
        $tz = new DateTimeZone($selectedTimezone);
        
        // Obtenemos la fecha actual en la zona seleccionada (fecha de inicio)
        $startDate = new DateTime("now", $tz);
        
        // Convertimos la fecha final ingresada a un objeto DateTime en la misma zona
        $endDate = new DateTime($endDateInput, $tz);
        
        // Validamos que la fecha final sea posterior a la fecha actual
        if ($endDate < $startDate) {
            $error = "La fecha final debe ser posterior a la fecha actual.";
        } else {
            // Determinamos el intervalo según la selección del usuario
            switch ($recurrence) {
                case 'daily':
                    $intervalSpec = 'P1D'; // 1 día
                    break;
                case 'weekly':
                    $intervalSpec = 'P1W'; // 1 semana
                    break;
                case 'monthly':
                    $intervalSpec = 'P1M'; // 1 mes
                    break;
                default:
                    $intervalSpec = 'P1W';
                    break;
            }
            
            $interval = new DateInterval($intervalSpec);
            
            // Generamos los eventos recurrentes utilizando un bucle
            $events = [];
            $currentEvent = clone $startDate;
            while ($currentEvent <= $endDate) {
                $events[] = clone $currentEvent;
                $currentEvent->add($interval);
            }
        }
    } catch (Exception $e) {
        $error = "Error en el procesamiento de la fecha: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Eventos Recurrentes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="display-4">Generador de Eventos Recurrentes</h1>
            <p class="lead">Configure su evento y seleccione la recurrencia deseada</p>
        </div>

        <form method="post" action="" class="card p-4 mb-4 shadow-sm">
            <div class="mb-3">
                <label for="end_date" class="form-label">Fecha Final (Formato: YYYY-MM-DD HH:MM:SS)</label>
                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="2025-12-31 23:59:59" required>
            </div>
            <div class="mb-3">
                <label for="timezone" class="form-label">Zona Horaria</label>
                <select class="form-select" id="timezone" name="timezone">
                    <option value="Europe/Madrid">Europe/Madrid</option>
                    <option value="America/New_York">America/New_York</option>
                    <option value="Asia/Tokyo">Asia/Tokyo</option>
                    <option value="UTC">UTC</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="recurrence" class="form-label">Tipo de Recurrencia</label>
                <select class="form-select" id="recurrence" name="recurrence">
                    <option value="daily">Diario</option>
                    <option value="weekly" selected>Semanal</option>
                    <option value="monthly">Mensual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Eventos</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="card p-4 shadow-sm">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php else: ?>
                    <h2 class="h4 mb-3">Eventos Recurrentes</h2>
                    <p><strong>Zona Horaria:</strong> <?php echo htmlspecialchars($selectedTimezone); ?></p>
                    <p><strong>Fecha de Inicio:</strong> <?php echo $startDate->format('Y-m-d H:i:s'); ?></p>
                    <p><strong>Fecha Final:</strong> <?php echo $endDate->format('Y-m-d H:i:s'); ?></p>
                    <p><strong>Recurrencia:</strong> <?php echo ucfirst($recurrence); ?></p>
                    <ul class="list-group mt-3">
                        <?php foreach ($events as $event): ?>
                            <li class="list-group-item"><?php echo $event->format('Y-m-d H:i:s'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                

        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> - Generador de Eventos Recurrentes</p>
        </div>
    </div>

    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
