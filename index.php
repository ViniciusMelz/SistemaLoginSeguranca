<?php
require("php/funcoes.php");
$conexao = mysqli_connect("localhost", "root", "", "sistemaseguranca", 3307);
$email = isset($_POST["email"]);
$senha = isset($_POST["senha"]);

$query = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $query);

if (!$result) {
    if (validaSenha("Teste.123")) {
        echo "Teste.123 valida";
    }
    if (validaSenha("Teste")) {
        echo "Teste valida";
    }
    if (validaSenha("teste.123")) {
        echo "teste.123 valida";
    }
    if (validaSenha("Teste.")) {
        echo "Teste. valida";
    }
    if (validaSenha("Teste123")) {
        echo "Teste123 valida";
    }
} else {
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

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
        width: calc(110% - 20px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .login-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    .login-container input[type="submit"]:hover {
        background-color: #45a049;
    }
    
    .login-container label {
        text-align: left;
        display: block;
        margin-bottom: 3px;
        font-weight: bold;
    }
</style>


<body>
    <div class="login-container">
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
    </div>

</body>

</html>