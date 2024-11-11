<?php
$estudiantes=[
    //Array asociativo del primer alumno
    ['nombre' => 'Alex Garcia',
    'nacimiento' => '14-03-2005' ,
    'residencia' => 'Madrid',
    'numero' => '698997763', 
    'correo'=> ' alex.garcia@example.com', 
    'repetidor'=> 'No',
    'Matematicas 1'=> 6,
    'Matematicas 2'=> 7,
    'Matematicas 3'=> 8,
    'Matematicas 4'=> 6,
    'Matematicas 5'=> 7,
    'Lengua 1' => 5,
    'Lengua 2' => 6,
    'Lengua 3' => 7,
    'Ingles 1' => 6,
    'Ingles 2' => 7,
    'Ingles 3' => 6,
    'Ingles 4' => 6,
    'Tecnologia 1' => 8,
    'Tecnologia 2' => 7,
],
    //Array asociativo del segundo alumno
    ['nombre' => 'Maria Lopez',
    'nacimiento' => '20-05-2005' ,
    'residencia' => 'Barcelona',
    'numero' => '612321147', 
    'correo'=> ' maria.lopez@example.com', 
    'repetidor'=> ' Sí',
    'Matematicas 1'=> 5,
    'Matematicas 2'=> 6,
    'Matematicas 3'=> 7,
    'Matematicas 4'=> 6,
    'Matematicas 5'=> 6,
    'Lengua 1' => 6,
    'Lengua 2' => 5,
    'Lengua 3' => 7,
    'Ingles 1' => 6,
    'Ingles 2' => 6,
    'Ingles 3' => 5,
    'Ingles 4' => 6,
    'Tecnologia 1' => 6,
    'Tecnologia 2' => 7,
],
    //Array asociativo del tercer alumno
    ['nombre' => 'Juan Pérez',
    'nacimiento' => '8-11-2004' ,
    'residencia' => 'Sevilla',
    'numero' => '677998844', 
    'correo'=> 'juan.perez@example.com', 
    'repetidor'=> 'No',
    'Matematicas 1'=> 7,
    'Matematicas 2'=> 6,
    'Matematicas 3'=> 8,
    'Matematicas 4'=> 7,
    'Matematicas 5'=> 7,
    'Lengua 1' => 6,
    'Lengua 2' => 7,
    'Lengua 3' => 6,
    'Ingles 1' => 7,
    'Ingles 2' => 6,
    'Ingles 3' => 7,
    'Ingles 4' => 6,
    'Tecnologia 1' => 8,
    'Tecnologia 2' => 6,
],
    //Array asociativo del cuarto alumno
    ['nombre' => 'Lucía Sanchez',
    'nacimiento' => '22-09-2005',
    'residencia' => 'Valencia',
    'numero' => '664889977',
    'correo'=> 'lucia.sanchez@example.com',
    'repetidor'=> 'Sí',
    'Matematicas 1'=> 4,
    'Matematicas 2'=> 5,
    'Matematicas 3'=> 4,
    'Matematicas 4'=> 3,
    'Matematicas 5'=> 4,
    'Lengua 1' => 5,
    'Lengua 2' => 5,
    'Lengua 3' => 6,
    'Ingles 1' => 4,
    'Ingles 2' => 4,
    'Ingles 3' => 5,
    'Ingles 4' => 4,
    'Tecnologia 1' => 5,
    'Tecnologia 2' => 4,
],
    //Array asociativo del quinto alumno
    ['nombre' => 'Carlos Martinez',
    'nacimiento' => '05-01-2005',
    'residencia' => 'Zaragoza',
    'numero' => '618997755',
    'correo'=> 'carlos.martinez@example.com',
    'repetidor'=> 'No',
    'Matematicas 1'=> 5,
    'Matematicas 2'=> 4,
    'Matematicas 3'=> 5,
    'Matematicas 4'=> 4,
    'Matematicas 5'=> 5,
    'Lengua 1' => 4,
    'Lengua 2' => 4,
    'Lengua 3' => 5,
    'Ingles 1' => 5,
    'Ingles 2' => 4,
    'Ingles 3' => 4,
    'Ingles 4' => 4,
    'Tecnologia 1' => 4,
    'Tecnologia 2' => 5,
],
];

// MATEMATICAS
// Hacemos la suma de todas las notas y la dividimos entre 5
$matematicas_0 = ($estudiantes[0]['Matematicas 1'] + $estudiantes[0]['Matematicas 2'] + $estudiantes[0]['Matematicas 3'] + $estudiantes[0]['Matematicas 4'] + $estudiantes[0]['Matematicas 5'])/5;
$matematicas_1 = ($estudiantes[1]['Matematicas 1'] + $estudiantes[1]['Matematicas 2'] + $estudiantes[1]['Matematicas 3'] + $estudiantes[1]['Matematicas 4'] + $estudiantes[1]['Matematicas 5'])/5; 
$matematicas_2 = ($estudiantes[2]['Matematicas 1'] + $estudiantes[2]['Matematicas 2'] + $estudiantes[2]['Matematicas 3'] + $estudiantes[2]['Matematicas 4'] + $estudiantes[2]['Matematicas 5'])/5; 
$matematicas_3 = ($estudiantes[3]['Matematicas 1'] + $estudiantes[3]['Matematicas 2'] + $estudiantes[3]['Matematicas 3'] + $estudiantes[3]['Matematicas 4'] + $estudiantes[3]['Matematicas 5'])/5; 
$matematicas_4 = ($estudiantes[4]['Matematicas 1'] + $estudiantes[4]['Matematicas 2'] + $estudiantes[4]['Matematicas 3'] + $estudiantes[4]['Matematicas 4'] + $estudiantes[4]['Matematicas 5'])/5; 

// LENGUA
// Multiplicamos la suma de la primera y segunda nota por un 0.4 para sacar el 40% y la tercera por 0.6 para sacar el 60% 
$lengua_0 =(((($estudiantes[0]['Lengua 1'] + $estudiantes[0]['Lengua 2'])/2)*0.4) + ($estudiantes[0]['Lengua 3'] * 0.6));
$lengua_1 =(((($estudiantes[1]['Lengua 1'] + $estudiantes[1]['Lengua 2'])/2)*0.4) + ($estudiantes[1]['Lengua 3'] * 0.6));
$lengua_2 =(((($estudiantes[2]['Lengua 1'] + $estudiantes[2]['Lengua 2'])/2)*0.4) + ($estudiantes[2]['Lengua 3'] * 0.6));
$lengua_3 =(((($estudiantes[3]['Lengua 1'] + $estudiantes[3]['Lengua 2'])/2)*0.4) + ($estudiantes[3]['Lengua 3'] * 0.6));
$lengua_4 =(((($estudiantes[4]['Lengua 1'] + $estudiantes[4]['Lengua 2'])/2)*0.4) + ($estudiantes[4]['Lengua 3'] * 0.6));

// INGLES
// Sumamos las cuatro notas y las dividimos entre 4
$ingles_0 = ($estudiantes[0]['Ingles 1'] + $estudiantes[0]['Ingles 2'] + $estudiantes[0]['Ingles 3'] + $estudiantes[0]['Ingles 4'])/4;
$ingles_1 = ($estudiantes[1]['Ingles 1'] + $estudiantes[1]['Ingles 2'] + $estudiantes[1]['Ingles 3'] + $estudiantes[1]['Ingles 4'])/4;
$ingles_2 = ($estudiantes[2]['Ingles 1'] + $estudiantes[2]['Ingles 2'] + $estudiantes[2]['Ingles 3'] + $estudiantes[2]['Ingles 4'])/4;
$ingles_3 = ($estudiantes[3]['Ingles 1'] + $estudiantes[3]['Ingles 2'] + $estudiantes[3]['Ingles 3'] + $estudiantes[3]['Ingles 4'])/4;
$ingles_4 = ($estudiantes[4]['Ingles 1'] + $estudiantes[4]['Ingles 2'] + $estudiantes[4]['Ingles 3'] + $estudiantes[4]['Ingles 4'])/4;

// TECNOLOGIA
// Multiplicamos la primera nota por 0.8 para sacar el 80% y lo sumamos con la segunda nota multiplicada por 0.2 (20%)
$tecnologia_0 = (($estudiantes[0]['Tecnologia 1'] * 0.8)+($estudiantes[0]['Tecnologia 2'] * 0.2));
$tecnologia_1 = (($estudiantes[1]['Tecnologia 1'] * 0.8)+($estudiantes[1]['Tecnologia 2'] * 0.2));
$tecnologia_2 = (($estudiantes[2]['Tecnologia 1'] * 0.8)+($estudiantes[2]['Tecnologia 2'] * 0.2));
$tecnologia_3 = (($estudiantes[3]['Tecnologia 1'] * 0.8)+($estudiantes[3]['Tecnologia 2'] * 0.2));
$tecnologia_4 = (($estudiantes[4]['Tecnologia 1'] * 0.8)+($estudiantes[4]['Tecnologia 2'] * 0.2));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Almunos</title>
</head>
<body>
    <h1>Datos de Evaluación para Cada Estudiante</h1>
    <h2>Estudiante 1:<?php echo $estudiantes[0]['nombre']; ?></h2>
    <p>Fecha de nacimiento: <?php echo $estudiantes[0]['nacimiento'];?></p>
    <p>Lugar de Residencia: <?php echo $estudiantes[0]['residencia'];?></p>
    <p>Telefono: <?php echo $estudiantes[0]['numero'];?></p>
    <p>Correo Electrónico: <?php echo $estudiantes[0]['correo'];?></p>
    <p>Estado de Repetidor: <?php echo $estudiantes[0]['repetidor'];?></p>

    <h2>Evaluaciones</h2>
    <p>Matematicas: <?=$matematicas_0?></p>
    <p>Lengua: <?=$lengua_0?></p>
    <p>Ingles: <?=$ingles_0?></p>
    <p>Tecnologia: <?=$tecnologia_0?></p>

    <h2>El alumn@ <?php echo $estudiantes[0]['nombre']; ?> a aprobado.</h2>

    <h2>Estudiante 2:<?php echo $estudiantes[1]['nombre']; ?></h2>
    <p>Fecha de nacimiento: <?php echo $estudiantes[1]['nacimiento'];?></p>
    <p>Lugar de Residencia: <?php echo $estudiantes[1]['residencia'];?></p>
    <p>Telefono: <?php echo $estudiantes[1]['numero'];?></p>
    <p>Correo Electrónico: <?php echo $estudiantes[1]['correo'];?></p>
    <p>Estado de Repetidor: <?php echo $estudiantes[1]['repetidor'];?></p>

    <h2>Evaluaciones</h2>
    <p>Matematicas: <?=$matematicas_1?></p>
    <p>Lengua: <?=$lengua_1?></p>
    <p>Ingles: <?=$ingles_1?></p>
    <p>Tecnologia: <?=$tecnologia_1?></p>

    <h2>El alumn@ <?php echo $estudiantes[1]['nombre']; ?> a aprobado.</h2>

    <h2>Estudiante 3:<?php echo $estudiantes[2]['nombre']; ?></h2>
    <p>Fecha de nacimiento: <?php echo $estudiantes[2]['nacimiento'];?></p>
    <p>Lugar de Residencia: <?php echo $estudiantes[2]['residencia'];?></p>
    <p>Telefono: <?php echo $estudiantes[2]['numero'];?></p>
    <p>Correo Electrónico: <?php echo $estudiantes[2]['correo'];?></p>
    <p>Estado de Repetidor: <?php echo $estudiantes[2]['repetidor'];?></p>

    <h2>Evaluaciones</h2>
    <p>Matematicas: <?=$matematicas_2?></p>
    <p>Lengua: <?=$lengua_2?></p>
    <p>Ingles: <?=$ingles_2?></p>
    <p>Tecnologia: <?=$tecnologia_2?></p>

    <h2>El alumn@ <?php echo $estudiantes[2]['nombre']; ?> a aprobado.</h2>

    <h2>Estudiante 4:<?php echo $estudiantes[3]['nombre']; ?></h2>
    <p>Fecha de nacimiento: <?php echo $estudiantes[3]['nacimiento'];?></p>
    <p>Lugar de Residencia: <?php echo $estudiantes[3]['residencia'];?></p>
    <p>Telefono: <?php echo $estudiantes[3]['numero'];?></p>
    <p>Correo Electrónico: <?php echo $estudiantes[3]['correo'];?></p>
    <p>Estado de Repetidor: <?php echo $estudiantes[3]['repetidor'];?></p>

    <h2>Evaluaciones</h2>
    <p>Matematicas: <?=$matematicas_3?></p>
    <p>Lengua: <?=$lengua_3?></p>
    <p>Ingles: <?=$ingles_3?></p>
    <p>Tecnologia: <?=$tecnologia_3?></p>

    <h2>El alumn@ <?php echo $estudiantes[3]['nombre']; ?> a suspendido.</h2>

    <h2>Estudiante 5:<?php echo $estudiantes[4]['nombre']; ?></h2>
    <p>Fecha de nacimiento: <?php echo $estudiantes[4]['nacimiento'];?></p>
    <p>Lugar de Residencia: <?php echo $estudiantes[4]['residencia'];?></p>
    <p>Telefono: <?php echo $estudiantes[4]['numero'];?></p>
    <p>Correo Electrónico: <?php echo $estudiantes[4]['correo'];?></p>
    <p>Estado de Repetidor: <?php echo $estudiantes[4]['repetidor'];?></p>

    <h2>Evaluaciones</h2>
    <p>Matematicas: <?=$matematicas_4?></p>
    <p>Lengua: <?=$lengua_4?></p>
    <p>Ingles: <?=$ingles_4?></p>
    <p>Tecnologia: <?=$tecnologia_4?></p>

    <h2>El alumn@ <?php echo $estudiantes[4]['nombre']; ?> a suspendido.</h2>


</body>
</html>