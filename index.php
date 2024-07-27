<?php
require_once ("php/funcoes.php");
session_start();
if (isset($_SESSION['trocouSenha'])) {
    if ($_SESSION['trocouSenha']) {
        $_SESSION['trocouSenha'] = false;
        ?>
        <script async>
            alert("Senha trocada com sucesso, logue novamente!");
        </script>
        <?php
    }

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * 
              FROM Usuario 
              WHERE email = '$email' 
              AND senha = '$senha'";
    $result = mysqli_query(conectarBanco(), $query);



    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row[1] == $email && $row[2] == $senha) {
                ?>
                <script>
                    alert('Login bem sucedido!');
                </script>
                <?php
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('location: php/loginRealizado.php');
            } else {
                ?>
                <script>
                    alert('Credenciais inválidas. Por favor, tente novamente.');
                </script>
                <?php
            }
            break;
        }
    } else {
        ?>
        <script>
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
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="vinicius@gmail.com" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>