<?php

namespace App\Service;

class Mutation{

    public function hasMutation(array $dna){
        
        $mutations = 0;
        foreach($dna as $cadena){
            $letras = str_split($cadena);

            $count = 1;
            $ant = "";
            foreach($letras as $letra){
                if ($letra === $ant){
                    $count++;
                }
                else{
                    $count = 1;
                }

                $ant = $letra;

                if($count >= 4 ) $mutations++;

            }
            
        }

        if($mutations > 1) return true;
        
        return false;
    }

}