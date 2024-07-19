<?php
    function verificaMaisculaeMinuscula($senha) {
        if (ctype_lower($senha) && ctype_upper($senha)) {
            return true;
        } else return false;
        
    }

    function verificaSeTemEspecial($senha) {
        if (ctype_punct($senha)) {
            return true;
        } else return false;
    }

    function verificaSeTem8caracter($senha) {
        if (count_chars($senha) >= 8) {
            return true;
        } else return false;
    }

    function verificaSeTem3numeros($senha) {
        $arr1 = str_split($senha);
        $counter = 0;
        foreach ($arr1 as $caracter) {
            if (ctype_digit($caracter)) {
                $counter++;
            }
        }
        
        if ($counter >= 3) {
            return true;
        } else return false;
    }

    function validaSenha($senha) {
        if (verificaMaisculaeMinuscula($senha) 
            && verificaSeTemEspecial($senha) 
            && verificaSeTem8caracter($senha) 
            && verificaSeTem3numeros($senha)) {
            return true;
        } else return false;
    }

    
?>