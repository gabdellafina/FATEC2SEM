<?php

session_start();

if (isset($_SESSION['email'])) {
    header("Location: cadastro.php");
    exit;
}


$erro = null;

if (isset($_POST['login'])) {
    include('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $select = $conexao->prepare("SELECT senha, nome FROM usuario WHERE email = :email");
        $select->bindParam(':email', $email);
        $select->execute();

        if ($select->rowCount() == 1) {
            if ($user = $select->fetch()) {
                if (password_verify($senha, $user['senha'])) {
                    $_SESSION['email'] = $email;
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['hora'] = time();
                    setcookie('email', $email, time() + (30 * 60)); // cookie válido por 30 minutos
                    header("Location: cadastro.php");
                    exit(); // Finaliza o script para evitar a execução adicional

                } else {
                    $erro = "Senha incorreta.";
                }
            }
        } else {
            $erro = "Email não encontrado.";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontes do Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            /* Montserrat para esta classe */
            color: #ffffff;
            /* Cor do texto branco */
        }

        .card {
            margin: 0 auto;
            /* Centraliza o cartão */
            max-width: 350px;
            /* Define uma largura máxima para o cartão */
            margin-top: 50px;
            /* Espaçamento superior */
            padding: 20px;
            /* Espaçamento interno */
        }

        .form-group {
            margin-bottom: 20px;
            /* Espaçamento entre campos de formulário */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="mb-0">DSM Shopping</h2>
            </div>
            <br>
            <form method="post" action="#">
                <div class="form-group">
                    <br>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger <?php if (empty($erro)) echo 'd-none'; ?>" role="alert">
                        <?php echo $erro;
                        
                        ?>
                    </div>
                </div>


                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" id="login" name="login">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>