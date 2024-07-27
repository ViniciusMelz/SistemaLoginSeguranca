<?php
require_once ("funcoes.php");
session_start();
$id_usuario = $_SESSION['id_usuario'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nova_senha = $_POST["nova_senha"];
    $repeticao_senha = $_POST["confirmar-senha"];

    if ($nova_senha != $repeticao_senha) {
        ?>
        <script async>
            alert("As senhas digitadas são diferentes, tente novamente!");
        </script>
        <?php
    } else {
        $query = "SELECT senha_antiga
              FROM senhas_antigas 
              WHERE id_usuario = '$id_usuario' 
              ORDER BY id DESC
              LIMIT 5";
        $result = mysqli_query(conectarBanco(), $query);

        if (validaSenha($nova_senha) == false) {
            $senhaValida = false;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                if ($row[0] == $nova_senha) {
                    $senhaValida = false;
                    break;
                } else {
                    $senhaValida = true;
                }
            }
        }

        if ($senhaValida) {
            $query = "UPDATE usuario
                  SET senha = '$nova_senha'
                  WHERE usuario.id = '$id_usuario'";
            $result = mysqli_query(conectarBanco(), $query);
            ?>
            <script async>
                alert("Senha trocada com Sucesso, Logue novamente!");
            </script>
            <?php
            sleep(2);
            header('Location: ../index.php');
        } else {
            ?>
            <script async>
                alert("Senha digitada é inválida, não atende aos requisitos!");
            </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    /* Reset básico */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        width: 100%;
    }

    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-size: 14px;
        color: #555;
    }

    input[type="password"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container">
        <h1>Alterar Senha</h1>
        <form action="" method="POST">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" id="nova_senha" name="nova_senha" required>

            <label for="confirmar-senha">Confirmar Senha:</label>
            <input type="password" name="confirmar-senha" required>

            <button type="submit">Alterar Senha</button>
        </form>
    </div>
</body>

</html>