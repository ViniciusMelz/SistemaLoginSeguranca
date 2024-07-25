<?php
require_once ("php/funcoes.php");
$conexao = mysqli_connect("localhost", "root", "", "sistemaseguranca", 3306);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $query);

    

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row[1] == $email && $row[2] == $senha) {
                ?>
                <script async>
                    //label = document.getElementsByClassName("labelErro");
                    //document.getElementById('erroLogin').innerText = 'Login bem sucedido';
                    alert('Login bem sucedido!');
                </script>
                <?php
            } else {
                ?>
                <script async>
                    //label = document.getElementsByClassName("labelErro");
                    //document.getElementById('erroLogin').innerText = 'Credenciais inválidas. Por favor, tente novamente.';
                    alert('Credenciais inválidas. Por favor, tente novamente.');
                </script>
                <?php
            }
            break;
        }
    } else {
        ?>
        <script async>
            //label = document.getElementsByClassName("labelErro");
            //label.innerText = 'Credenciais inválidas. Por favor, tente novamente.';
            alert('Credenciais inválidas. Por favor, tente novamente.');
        </script>
        <?php
    }
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
        <form method="post" action="">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="vinicius@gmail.com" required><br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required>
            <p name="labelErro" id="erroLogin" class="labelErro"></p>
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>