<?php
$modulos =[
    [
    'nombre' => 'DWEC',
],
    [
    'nombre'=> 'DAW',
],
    [
    'nombre'=> 'EIE',
],
    [
    'nombre'=> 'DIW',
],
    [
    'nombre'=> 'DWES',
],
    [
    'nombre'=> 'HLC',
],
];
?>

<style>
table {
border-collapse: collapse;
width: 100%;
text-align: center;
}
th, td {
border: 1px solid black;
padding: 10px;
}
th {
background-color: #f2f2f2;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Hora<td>
            <td>Lunes<td>
            <td>Martes<td>
            <td>Miercoles<td>
            <td>Jueves<td>
            <td>Viernes<td>
        </tr>

        <tr>
            <td>1ª Hora<td>
            <td><?php echo $modulos[3]['nombre']?><td>
            <td><?php echo $modulos[1]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
        </tr>

        <tr>
            <td>2ª Hora<td>
            <td><?php echo $modulos[3]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
        </tr>

        <tr>
            <td>3ª Hora<td>
            <td><?php echo $modulos[2]['nombre']?><td>
            <td><?php echo $modulos[4]['nombre']?><td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[3]['nombre']?><td>
            <td><?php echo $modulos[3]['nombre']?><td>
        </tr>

        <tr>
            <td  colspan = "11">Recreo<td>
        </tr>

        <tr>
            <td>4ª Hora<td>
            <td><?php echo $modulos[2]['nombre']?><td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[3]['nombre']?><td>
            <td><?php echo $modulos[3]['nombre']?><td>
        </tr>

        <tr>
            <td>5ª Hora<td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[5]['nombre']?><td>
            <td><?php echo $modulos[2]['nombre']?><td>
            <td><?php echo $modulos[1]['nombre']?><td>
        </tr>

        <tr>
            <td>6ª Hora<td>
            <td><?php echo $modulos[0]['nombre']?><td>
            <td><?php echo $modulos[5]['nombre']?><td>
            <td><?php echo $modulos[1]['nombre']?><td>
            <td><?php echo $modulos[2]['nombre']?><td>
            <td><?php echo $modulos[5]['nombre']?><td>
        </tr>
        
    </table>
</body>
</html>