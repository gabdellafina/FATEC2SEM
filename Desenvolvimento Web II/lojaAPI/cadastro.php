<?php
session_start();
$tempoLimiteSessao = 1800; // 30 minutos

// Verifica se a sessão já foi iniciada e calcula o tempo desde a última atividade
if (isset($_SESSION['ULTIMA_ATIVIDADE'])) {
    $ultimaAtividade = $_SESSION['ULTIMA_ATIVIDADE'];
    $tempoAtual = time();
    $tempoDesdeUltimaAtividade = $tempoAtual - $ultimaAtividade;

    // Verifica se a sessão excedeu a duração limite
    if ($tempoDesdeUltimaAtividade > $tempoLimiteSessao) {
        // Sessão expirada, destrói a sessão
        session_unset();
        session_destroy();
    } else {
        // Atualiza o tempo da última atividade
        $_SESSION['ULTIMA_ATIVIDADE'] = $tempoAtual;
    }
} else {
    // Define o tempo da última atividade para a sessão
    $_SESSION['ULTIMA_ATIVIDADE'] = time();
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    
    exit;
}

if (isset($_POST['criar'])) {
    $nome = $_POST['nome'];
    $preco = preg_replace('/[^0-9]/', '', $_POST['preco']);
    $preco = preg_replace("/^R\$ /", "", $preco);
    // Obtém a parte inteira (reais) e a parte decimal (centavos)

    // Extrai os caracteres da string $preco, começando do índice 0 até o penúltimo caractere,
    // o que resulta na parte inteira do preço (reais)
    $reais = substr($preco, 0, -2);

    // Extrai os dois últimos caracteres da string $preco, representando a parte decimal do preço (centavos)
    $centavos = substr($preco, -2);

    $preco_formatado = $reais . '.'. $centavos;
 
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
        if ($arquivo['error']) die("Falha ao enviar arquivo");


        if ($arquivo['size'] > 2097152)
            die("Arquivo muito grande !! Max: 2MB");

        $pasta = "imagens/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg')
            die("Tipo do arquivo nao aceito");
        $path =  $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);



        if ($deu_certo) {
            try {
                require "conexao.php";
                $sql = "INSERT INTO produto (nome,preco,foto) VALUES ('$nome','$preco_formatado' ,'$path') ";
                $conexao->exec($sql);
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
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
            /* Cor do texto branco */
        }

        .card {
            margin: 0 auto;
            /* Centraliza o cartão */
            max-width: 550px;
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

        .custom-file-input {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 8px 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        #formatted-value {
    font-size: 16px; /* Tamanho da fonte */
    font-weight: bold; /* Texto em negrito */
    color: #333; /* Cor do texto */
    padding: 5px; /* Espaçamento interno */
    margin-top: 5px; /* Margem superior */
    display: inline-block; /* Elemento em linha com margens e padding */
    border: 1px solid #ccc; /* Borda */
    border-radius: 5px; /* Borda arredondada */
    background-color: #f9f9f9; /* Cor de fundo */
}

        .custom-file-input:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .custom-file-input:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .custom-file-label {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="#">DSM Shopping</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagVendas.php">Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                </ul>
                <form class="d-flex" method="post">
                    <span class="navbar-text me-4"><?php echo $_SESSION['email']; ?></span>
                    <input type="submit" name="logout" value="Sair" class="btn btn-danger btn-sm">
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="mb-0">Cadastre um Produto</h2>
            </div>
            <br>
            <form method="POST" enctype="multipart/form-data" action="#">
                <div class="form-group">
                    <br>
                    <a><?php echo "Olá " .  $_SESSION['nome'] ?></a>
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <br>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="form-group">

                    <for="preco">Preço:</label>
                        <input type="text" id="money" class="form-control"  name="preco" onkeyup="formatCurrency(this)">
                        <span id="formatted-value"></span>

                </div>

                <div class="form-group">
                    <label for="arquivo">Selecione uma foto:</label>
                    <div class="input-group mb-4">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                        <label class="custom-file-label" for="arquivo">Escolher arquivo</label>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" id="criar" name="criar">Criar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('arquivo').addEventListener('change', function() {
            var nomeArquivo = this.value.split('\\').pop(); // Obtém apenas o nome do arquivo, removendo o caminho
            var label = document.querySelector('.custom-file-label');
            label.textContent = nomeArquivo;
        });

        function formatCurrency(input) {
    // Limpa o formato atual
    var value = input.value.replace(/\D/g, '');

    // Formata o número como moeda brasileira
    var formattedValue = (value / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });

    // Exibe o valor formatado
    input.nextElementSibling.textContent = formattedValue;
}

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>