<?php

// Clase CalculadoraDeNavidad
class CalculadoraDeNavidad
{

    /**
     * Calcula y devuelve un array que representa la distribución de regalos asignados a cada casa.
     * Cada índice del array corresponde a una casa, y el valor en ese índice indica la cantidad de regalos
     * asignados a dicha casa.
     *
     * Este método asegura que los regalos se distribuyan de manera equitativa entre todas las casas, 
     * y que cualquier regalo sobrante se distribuya en orden, comenzando por las primeras casas.
     * 
     * @param int $totalRegalos La cantidad total de regalos disponibles para repartir.
     * @param int $totalCasas El número total de casas entre las cuales se distribuyen los regalos.
     * @return array Un array donde cada elemento indica la cantidad de regalos asignados a la casa correspondiente.
     *
     * Detalles del cálculo:
     * - Se calcula una cantidad base de regalos (`repartoBase`) que cada casa recibe al dividir 
     *   equitativamente el total de regalos entre las casas (división entera).
     * - Los regalos sobrantes (`sobrantes`) se distribuyen uno por uno entre las primeras casas, 
     *   garantizando que ningún regalo quede sin asignar.
     * - El bucle principal inicializa cada casa con la cantidad base de regalos, mientras que 
     *   un segundo bucle asigna los sobrantes a las primeras casas.
     *
     * Ejemplo:
     * Si hay 10 regalos y 3 casas:
     * - Cada casa recibe inicialmente 3 regalos.
     * - Quedan `10 % 3 = 1` regalo sobrante, que se asigna a la primera casa.
     * - Resultado final: [4, 3, 3].
     */
    public function calcularRegalosPorCasa(int $totalRegalos, int $totalCasas): array
    {

        $regalos = [];

        for ($i = 0; $i < $totalCasas; $i++) {
            $regalos[$i] = 3;
            $totalRegalos -= 3;
        }

        $j = 0;
        while ($totalRegalos > 0) {
            $regalos[$j] += 1;
            $totalRegalos -= 1;
            $j++;
        }

        return $regalos;
    }

    /**
     * Distribuye regalos a cada casa en función de la lista de asignaciones y los regalos disponibles.
     * 
     * Este método genera un array bidimensional donde cada elemento representa una casa y contiene 
     * un sub-array con los regalos (sus nombres, simples cadenas de texto) asignados a esa casa. 
     * La distribución de regalos depende del número especificado en el array `$asignaciónDeRegalos` y 
     * de las cartas de deseos asociadas a cada casa (cada índice del array $asignaciónDeRegalos).
     * 
     * Reglas de asignación:
     * - Si una carta contiene palabras prohibidas (reemplazadas previamente con asteriscos), 
     *   esa casa recibe únicamente el regalo "carbón".
     * - De lo contrario, se asignan los regalos obtenidos de la lista de deseos mediante 
     *   el método `obtenerRegalo()` de la clase `ListaDeDeseos`.
     * 
     * @param array $asignacionDeRegalos Un array indexado donde cada índice corresponde a una casa
     * y su valor indica el número de regalos asignados a dicha casa.
     * @param ListaDeDeseos $deseos Una instancia de la clase `ListaDeDeseos`, que contiene las 
     * cartas procesadas y la lista de regalos disponibles para repartir.
     * @return array Un array bidimensional indexado donde cada sub-array (también indexado) representa 
     * una casa con los regalos asignados. En caso de palabras prohibidas, la casa recibe únicamente ["carbón"].
     * 
     * Detalles del proceso:
     * 1. Se itera a través de cada casa en el array `$asignaciónDeRegalos`.
     * 2. Para cada casa:
     *    - Si la carta asociada contiene palabras prohibidas (detectadas por la presencia de 
     *      uno o más asteriscos consecutivos en la carta):
     *      - Se asigna únicamente el regalo "carbón".
     *    - Si la carta es válida:
     *      - Se genera un sub-array de regalos asignados a la casa, obteniendo cada regalo 
     *        mediante el método `obtenerRegalo()` de la clase `ListaDeDeseos`.
     * 3. Finalmente, el array resultante se devuelve, con cada sub-array correspondiente a una casa.
     *
     * Ejemplo:
     * - `$asignaciónDeRegalos = [2, 3, 1]` (2 regalos para la casa 0, 3 para la casa 1, 1 para la casa 2).
     * - Las cartas asociadas contienen:
     *     - Casa 0: Carta válida.
     *     - Casa 1: Carta válida.
     *     - Casa 2: Carta con palabras prohibidas (reemplazadas por asteriscos).
     * - Resultado: 
     *     [
     *         ["regalo1", "regalo2"],  // Casa 0 recibe 2 regalos.
     *         ["regalo3", "regalo4", "regalo5"],  // Casa 1 recibe 3 regalos.
     *         ["carbón"]  // Casa 2 recibe carbón debido a palabras prohibidas.
     *     ]
     */
    public function repartirRegalos(array $asignacionDeRegalos, ListaDeDeseos $deseos): array
    {
        $regalosAsignados = [];
        for ($i = 0; $i < count($asignacionDeRegalos); $i++) {
            $regalosAsignados[$i] = [];
            $carta = $deseos->obtenerCartas();

            if (preg_match('/\*{2,}/', $carta[$i])) {
                $regalosAsignados[$i][] = "carbón";
            } else {
                for ($j = 0; $j < $asignacionDeRegalos[$i]; $j++) {
                    $regalosAsignados[$i][] = $deseos->obtenerRegalo();
                }
            }
        }
        return $regalosAsignados;
    }

    /**
     * Calcula el coste total de una lista de regalos.
     * 
     * Este método toma un array de nombres de regalos y calcula su coste total utilizando los precios almacenados 
     * en una instancia de la clase `ListaDeDeseos`. Para cada regalo en la lista, se consulta su precio mediante 
     * el método `obtenerPrecioRegalo` de la clase `ListaDeDeseos`. El resultado es la suma de los precios de todos los regalos.
     * 
     * 
     * Funcionamiento:
     * - Inicializa una variable `$coste` con un valor de `0`, que se utilizará para acumular el coste total de los regalos.
     * - Itera sobre cada regalo en el array `$regalos`.
     *   - Para cada regalo, utiliza el método `obtenerPrecioRegalo` de `$listaDeseos` para obtener su precio.
     *   - Suma el precio del regalo a la variable `$coste`.
     * - Devuelve el valor acumulado en `$coste`, que representa el coste total de todos los regalos.
     * 
     * Detalles importantes:
     * - Si el regalo es "carbón", el método `obtenerPrecioRegalo` devolverá `0`, por lo que no afecta al coste total.
     * 
     * @param array $regalos Lista de nombres de regalos cuyos precios se deben calcular.
     * @param ListaDeDeseos $listaDeseos Instancia de la clase que contiene los precios de los regalos.
     * @return float El coste total de los regalos en el array `$regalos`.
     */
    public function calcularCosteRegalos(array $regalos, ListaDeDeseos $listaDeseos): float
    {
        $coste = 0;
        foreach ($regalos as $regalo) {
            $precio = $listaDeseos->obtenerPrecioRegalo($regalo);
            $coste += $precio;
        }
        return $coste;
    }

    /**
     * Muestra estadísticas sobre el reparto de regalos y los aciertos obtenidos.
     * 
     * Este método calcula y muestra información relevante sobre el reparto de regalos de Navidad, incluyendo:
     * - El número total de regalos repartidos.
     * - El número total de casas en las que se realizó el reparto.
     * - El número de aciertos (casas donde al menos un regalo coincidió con los deseos expresados).
     * - El porcentaje de aciertos respecto al total de casas.
     * - Un mensaje final que indica si la Navidad fue feliz (basado en el porcentaje de aciertos).
     * 
     * Parámetros:
     * - `$repartoRegalos` (array): Un array bidimensional donde cada sub-array contiene los regalos asignados a cada casa.
     *   Ejemplo: `[
     *                  ["bicicleta", "patinete"], 
     *                  ["carbón"], 
     *                  ["videoconsola"]
     *             ]`.
     * - `$analisis` (array): Un array de booleanos que indica si se acertó (true) o no (false) en cada casa con el regalo entregado.
     *   Ejemplo: `[true, false, true]`.
     * 
     * Funcionamiento:
     * 1. Calcula el número total de regalos repartidos sumando la cantidad de regalos en cada sub-array de `$repartoRegalos`.
     * 2. Determina el número total de casas usando la longitud de `$repartoRegalos`.
     * 3. Cuenta el número de aciertos en `$analisis` (valores `true`).
     * 4. Calcula el porcentaje de aciertos como `(número de aciertos / número de casas) * 100`.
     * 5. Evalúa si el porcentaje de aciertos es mayor o igual al 50% para definir si la Navidad fue "feliz" o "triste".
     * 6. Muestra los resultados en formato HTML, utilizando etiquetas `<ul>` y `<li>` para una presentación estructurada.
     * 
     * Detalles importantes:
     * - Este método no realiza validaciones sobre la relación entre `$repartoRegalos` y `$analisis`. Se asume que ambos arrays 
     *   están correctamente alineados (es decir, tienen la misma cantidad de elementos).
     * - Este método solo muestra las estadísticas en pantalla (a través de `echo`) y no devuelve ningún valor.
     * 
     * @param array $repartoRegalos Array bidimensional con los regalos asignados a cada casa.
     * @param array $analisis Array de booleanos que indica si se acertó con los regalos entregados.
     * @return void Este método no retorna valores; solo genera salida en pantalla.
     */
    public function mostrarEstadisticas(array $repartoRegalos, array $analisis): void
    {
        $contadorRegalos = 0;
        foreach ($repartoRegalos as $casa) {
            $contadorRegalos += count($casa);
        }
        $totalCasas = count($repartoRegalos);
        $totalAciertos = 0;
        foreach ($analisis as $acierto) {
            if ($acierto) {
                $totalAciertos++;
            }
        }
        $porcentajeAciertos = ($totalCasas > 0) ? ($totalAciertos / $totalCasas) * 100 : 0;
        $felizNavidad = $porcentajeAciertos >= 50;
        echo "<h2>Estadísticas del Reparto de Regalos</h2>";
        echo "<ul>";
        echo "<li>Número total de regalos repartidos: <strong>{$contadorRegalos}</strong></li>";
        echo "<li>Número total de casas: <strong>{$totalCasas}</strong></li>";
        echo "<li>Número de aciertos: <strong>{$totalAciertos}</strong></li>";
        echo "<li>Porcentaje de aciertos: <strong>" . number_format($porcentajeAciertos, 2) . "%</strong></li>";
        echo "</ul>";
        if ($felizNavidad) {
            echo "<p>¡La Navidad fue <strong>Feliz</strong>!</p>";
        } else {
            echo "<p>La Navidad fue <strong>Triste</strong>.</p>";
        }
    }
}
