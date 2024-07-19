<?php
    function verificaMaisculaeMinuscula($senha) {
        if (ctype_lower($senha) && ctype_upper($senha)) {
            return true;
        }
    }

    function verificaSeTem3Numeros($senha) {
        if (count_chars(ctype_alnum($senha))) {
            return true;
        }
    }
?>