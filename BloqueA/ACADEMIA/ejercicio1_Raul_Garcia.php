<?php
    // Función que crea el array
    function generaArrayInt(int $min, int $max, int $n = 10, int $value = 7): array {
        $listaNumeros = [];
        if ($n == 10 && $value == 7) {
            for ($i=0; $i < $n ; $i++) { 
                $listaNumeros[$i] = rand($min, $max);
            }

            return $listaNumeros;
        } else {
            for ($i=0; $i < $n ; $i++) { 
                $listaNumeros[$i] = $value++;
            }

            return $listaNumeros;
        }
    }

    // Función que muestra el array en el formato solicitado
    function muestraArray(array $lista): string {
        $cadenaSalida = "(";
        for ($i=0; $i < count($lista) ; $i++) { 
            // Variable numérica que determina que estamos en la última posición del array
            $resta = count($lista) - $i;
            if ($resta > 1) {
                // Para concatenar cadenas se usa el punto
                $cadenaSalida .= $lista[$i] . ", ";
            } else {
                $cadenaSalida .= $lista[$i] . ")";
            }
        }
        return $cadenaSalida;
    }

    // Función que determina cual es el elemento más pequeño del array
    function minimoArrayInt(array $lista): int {
        $minimo = $lista[0];
        for ($i=0; $i < count($lista); $i++) { 
            if ($lista[$i] < $minimo) {
                $minimo = $lista[$i];
            }
        }
        return $minimo;
    }

    // Función que determina cual es el elemento más grande del array
    function maximoArrayInt(array $lista): int {
        $maximo = $lista[0];
        for ($i=0; $i < count($lista); $i++) { 
            if ($lista[$i] > $maximo) {
                $maximo = $lista[$i];
            }
        }
        return $maximo;
    }

    // Función que devuelve la media del array
    function mediaArrayInt(array $lista): float {
        $media = 0;
        for ($i=0; $i < count($lista); $i++) { 
            $media += $lista[$i];
        }
        $media = $media / count($lista);
        return $media;
    }

    // Devuelve si un numero solicitado por el usuario está o no en el array
    function estaEnArrayInt(int $numero, array $lista): string {
        $esta = false;
        for ($i=0; $i < count($lista); $i++) { 
            if ($lista[$i] == $numero) {
                $esta = true;
            }
        }

        if ($esta) {
            return 'Si';
        } else {
            return 'No';
        }
    }

    $numeroABuscar = 50;

    // Devuelve la posición donde se encuentra el numero buscado anteriormente
    function posicionEnArray(int $numero, array $lista) {
        for ($i=0; $i < count($lista); $i++) { 
            if ($lista[$i] == $numero) {
                return $i;
            }
        }
        return 'No se encuentra';
    }

    // Muestra el array en el orden inverso
    function volteaArrayInt(array $lista): string {
        $cadenaSalida = "(";
        for ($i=count($lista) - 1; $i >= 0 ; $i--) { 
            // Variable numérica que determina que estamos en la última posición del array inverso
            $resta =  $i + 1;
            if ($resta == 1) {
                // Para concatenar cadenas se usa el punto
                $cadenaSalida .= $lista[$i] . ")";
            } else {
                $cadenaSalida .= $lista[$i] . ", ";
            }
        }
        return $cadenaSalida;
    }

    // Muestra la suma total de todos los elementos del array
    function sumaAcumuladaArray(array $lista): int {
        $total = 0;
        for ($i=0; $i < count($lista); $i++) { 
            $total += $lista[$i];
        }
        return $total;
    }

    $sumaAcumulada = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen PHP Raúl García</title>
</head>
<body>
    <h1>Resultados de las funciones de Array</h1>
    <h2>Array 1 (Aleatorios)</h2>
    <?php $listaAleatoria = generaArrayInt(1, 72); ?>
    <p><?= muestraArray($listaAleatoria); ?></p>
    <h2>Resultados de las Funciones</h2>
    <p><b>Mínimo: </b><?= minimoArrayInt($listaAleatoria)?></p>
    <p><b>Máximo: </b><?= maximoArrayInt($listaAleatoria)?></p>
    <p><b>Media: </b><?= mediaArrayInt($listaAleatoria)?></p>
    <p><b>¿Está el número <?= $numeroABuscar ?> en el array?: </b><?= estaEnArrayInt($numeroABuscar, $listaAleatoria)?></p>
    <p><b>Posición del número <?= $numeroABuscar ?>: </b><?= posicionEnArray($numeroABuscar, $listaAleatoria)?></p>
    <h2>Array Modificado</h2>
    <p><b>Array Volteado: </b><?= volteaArrayInt($listaAleatoria); ?></p>
    <h2>Suma acumulada</h2>
    <?php $sumaAcumulada +=  sumaAcumuladaArray($listaAleatoria) ?>
    <p><b><?= $sumaAcumulada ?></b></p>
    <br>
    <hr>
    <h2>Array 2 (Valor fijo)</h2>
    <?php $listaFija = generaArrayInt(1, 72, 10, 49); ?>
    <p><?= muestraArray($listaFija); ?></p>
    <h2>Resultados de las Funciones</h2>
    <p><b>Mínimo: </b><?= minimoArrayInt($listaFija)?></p>
    <p><b>Máximo: </b><?= maximoArrayInt($listaFija)?></p>
    <p><b>Media: </b><?= mediaArrayInt($listaFija)?></p>
    <p><b>¿Está el número <?= $numeroABuscar ?> en el array?: </b><?= estaEnArrayInt($numeroABuscar, $listaFija)?></p>
    <p><b>Posición del número <?= $numeroABuscar ?>: </b><?= posicionEnArray($numeroABuscar, $listaFija)?></p>
    <h2>Array Modificado</h2>
    <p><b>Array Volteado: </b><?= volteaArrayInt($listaFija); ?></p>
    <h2>Suma acumulada</h2>
    <?php $sumaAcumulada +=  sumaAcumuladaArray($listaFija) ?>
    <p><b><?= $sumaAcumulada ?></b></p>
</body>
</html>