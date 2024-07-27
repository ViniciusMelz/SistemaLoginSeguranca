<?php

    function conectarBanco() {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "sistemaseguranca";
        $porta = 3306;
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);
        return $conexao;
    }
    function verificaMinuscula($senha):bool {
        $arr1 = str_split($senha);
        foreach ($arr1 as $caracter) {
            if (ctype_lower($caracter)) {
                return true;
            }
        }
        return false;
    }

    function verificaMaiscula($senha):bool {
        $arr1 = str_split($senha);
        foreach ($arr1 as $caracter) {
            if (ctype_upper($caracter)) {
                return true;
            }
        }
        return false;
    }

    function verificaSeTemEspecial($senha):bool {
        $arr1 = str_split($senha);
        foreach ($arr1 as $caracter) {
            if (ctype_punct($caracter)) {
                return true;
            }
        }
        return false;
    }

    function verificaSeTem8caracter($senha):bool {
        if (count_chars($senha) >= 8) {
            return true;
        } else {
            return false;
        }
    }

    function verificaSeTem3numeros($senha):bool {
        $arr1 = str_split($senha);
        $counter = 0;
        foreach ($arr1 as $caracter) {
            if (ctype_digit($caracter)) {
                $counter++;
            }
        }
        
        if ($counter >= 3) {
            return true;
        } else {
            return false;
        }
    }

    function validaSenha($senha):bool {
        if (verificaMaiscula($senha) 
            && verificaMinuscula($senha)
            && verificaSeTemEspecial($senha) 
            && verificaSeTem8caracter($senha) 
            && verificaSeTem3numeros($senha)) {
            return true;
        } else {
            return false;
        }
    }

    
?>