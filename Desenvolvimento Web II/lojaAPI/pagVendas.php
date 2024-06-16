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
if (isset($_POST['comprar'])) {
    $_SESSION['id_produto'] = $_POST['id_produto'];
    header("Location: checkout.php");
    exit;
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

        .product-card {
            width: 200px;
            margin: 0 10px; /* Adiciona espaçamento horizontal entre os cards */
            margin-top: 80px; /* Ajusta a margem superior dos cards */
        }
        .product-image {
            height: 200px;
            object-fit: cover;
        }
        .carousel-container {
            margin-top: 50px; /* Ajuste conforme necessário */
            margin: 0 auto; /* Centraliza o carrossel horizontalmente */
            width: 80%; /* Define a largura máxima do carrossel */
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
    
    <div class="container">
    <div class="row">
     

        <?php
                try{
                    
                    include('conexao.php');
                    
                    $smtm = $conexao->prepare("SELECT id,nome, preco,foto from produto");
                    $smtm ->execute();
                    
                    $resultados = $smtm->fetchAll(PDO::FETCH_ASSOC);
                    
                    if($resultados){
                        foreach($resultados as $user){
                            echo ' 
                            <div class="col-md-2">
                            <div class="card product-card">
                            <img src='.$user['foto'].' class="card-img-top product-image">                              
                              <div class="card-body">
                                <h5 class="card-title">'.$user['nome'].'</h5>
                                    <p class="card-text">R$ '.$user['preco'].'</p>
                                    <form method="post" action="">
                                    <input type="hidden" name="id_produto" value="' . $user['id'] . '">
                                    
                                    <input type="submit" name="comprar" value="Comprar" class="btn btn-primary">
                                    
                                </form>                               
                                 </div>
                            </div>
                        </div>
                            ';
                           
                            
                           
                        }
                    }
                    }  catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }

              
                
                ?>
      

         

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>