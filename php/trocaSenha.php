<?php
    require_once("php/funcoes.php");

    $senha_nova = $_POST["senha_nova"];


    $query = "SELECT senha_antiga FROM senha_antigas";
    $result = mysqli_query(conectarBanco(), $query);


    // A ideia aqui é verificar se a senha nova que a pessoa digitou
    // é uma senha antiga já presente no banco de dados. Se retornar true
    // a senha está no banco e não pode ser aceita. Também verifica se 
    // a senha nova corresponde aos requisitos.
    // Recomendo testar para ver se está funcionando
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row[1] == $senha_nova && validaSenha($senha_nova) == false) {
                ?>
                    <script async>
                        alert("Senha inválida, tente novamente")
                    </script>
                <?
            } else {
                ?>
                    <script async>
                        alert("Senha atualizada")
                    </script>
                <?
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
        <form action="/alterar-senha" method="POST">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" id="nova_senha" name="nova_senha" required>

            <label for="confirmar-senha">Confirmar Senha:</label>
            <input type="password" name="confirmar-senha" required>

            <button type="submit">Alterar Senha</button>
        </form>
    </div>
</body>

</html>