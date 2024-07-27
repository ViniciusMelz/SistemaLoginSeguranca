<?php
require_once ("funcoes.php");
session_start();
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$query = "SELECT id 
          FROM Usuario 
          WHERE email = '$email' 
          AND senha = '$senha'";
$result = mysqli_query(conectarBanco(), $query);

$row = mysqli_fetch_array($result);
$_SESSION['id_usuario'] = $row[0];
$queryDiferencaDatas = "SELECT DATEDIFF(SYSDATE(), data_criacao) 
                        FROM senhas_antigas 
                        WHERE id_usuario = '$row[0]' 
                        ORDER BY id DESC 
                        LIMIT 1";
$resultDiferencaDatas = mysqli_query(conectarBanco(), $queryDiferencaDatas);
$rowDiferencaDatas = mysqli_fetch_array($resultDiferencaDatas);
$diferencaDatas = $rowDiferencaDatas[0];

if ($diferencaDatas > 45) {
    $text = 'Você já está com a mesma senha a mais de 45 dias, pedimos que troque a senha!';
}else{
    $text = 'Logado com Sucesso!';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1><?php echo $text ?></h1>
    <div class="buttons-container">
        <a href="trocaSenha.php"><button id="btnLoginRealizado">Trocar Senha</button></a>
        <a href="../index.php"><button id="btnLoginRealizado">Sair</button></a>
    </div>
</body>

</html>