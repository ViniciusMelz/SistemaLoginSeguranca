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
            $_SESSION['trocouSenha'] = true;
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
    <link rel="stylesheet" href="../style/style.css">
</head>

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

    <div class="requisitos-senha">
        <h3 style="text-align: center">A senha deve atender aos seguintes requisitos:</h3>
        <p>
        • Conter letras maiúsculas e minúsculas. <br>
        • Conter pelo menos 3 números. <br>
        • Conter pelo menos um caractere especial. <br>
        • Ter o tamanho mínimo de 8 caracteres. <br>
        • A senha não deve ser igual as ultimas 5 senhas.
        </p>
    </div>
</body>

</html>