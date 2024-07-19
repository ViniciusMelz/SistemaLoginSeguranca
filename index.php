<?php
    require("php/funcoes.php");
    $conexao = mysqli_connect("localhost", "root", "", "sistemaseguranca");
    $email = isset($_POST["email"]);
    $senha = isset($_POST["senha"]);

    $query = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $query);

    if(!$result){
        if(validaSenha("Teste.123")){
            echo "Teste.123 valida";
        }
        if(validaSenha("Teste")){
            echo "Teste valida";
        }
        if(validaSenha("teste.123")){
            echo "teste.123 valida";
        }
        if(validaSenha("Teste.")){
            echo "Teste. valida";
        }
        if(validaSenha("Teste123")){
            echo "Teste123 valida";
        }
    }else{
        ?>
            <script>
                document.getElementById('erroLogin').innerText("Email ou senha incorretos, tente novamente!");
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="index.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="vinicius@gmail.com" required><br><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required>
        <p id="erroLogin"></p>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>