<?php

namespace App\Service;

class Mutation{

    public function hasMutation(array $dna) {
    $mutations = 0;
    $size = count($dna);


    // Horizontal 
    foreach ($dna as $cadena) {
        $letras = str_split($cadena);
        $count = 1;
        $ant = "";
        foreach ($letras as $letra) {
            if ($letra === $ant) {
                $count++;
            } else {
                $count = 1;
            }
            $ant = $letra;

            if ($count >= 4) {
                $mutations++;
            }
        }
    }

    // vertical
    for($columna = 0; $columna < $size; $columna++) {
        $count = 1;
        $ant = "";
        for ($fila = 0; $fila < $size; $fila++){
            $letra = $dna[$fila] [$columna];
            if ($letra === $ant) {
                $count++;
            } else {
                $count = 1;
            }
            $ant = $letra;
            if ($count >= 4) {
                $mutations++;
            }
        }
    }

    // Diagonales (filas)
    for ($filaInicio = 0; $filaInicio < $size; $filaInicio++) {
        $count = 1;
        $ant = "";
        for ($desplazamiento = 0; $desplazamiento < $size - $filaInicio; $desplazamiento++) {
            $letra = $dna[$filaInicio + $desplazamiento][$desplazamiento];
            if ($letra === $ant) {
                $count++;
            } else {
                $count = 1;
            }
            $ant = $letra;
            if ($count >= 4) {
                $mutations++;
            }
        }
    }

    // Diagonal (columnas)
    for ($columnaInicio = 1; $columnaInicio < $size; $columnaInicio++) {
        $count = 1;
        $ant = "";
        for ($desplazamiento = 0; $desplazamiento < $size - $columnaInicio; $desplazamiento++) {
            $letra = $dna[$desplazamiento][$columnaInicio + $desplazamiento];
            if ($letra === $ant) {
                $count++;
            } else {
                $count = 1;
            }
            $ant = $letra;
            if ($count >= 4) {
                $mutations++;
            }
        }
    }
        return $mutations > 1;
    }

}