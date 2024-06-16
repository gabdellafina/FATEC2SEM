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
require __DIR__ . "/vendor/autoload.php";   

$stripe_secret_key = "sk_test_51PK20605NiIeqJ60zH04E63bDKmJztEE1ZpTlY84ZZlSupMPReq865mB6WfrBE3BhZdUDqZBBC1y4wa6Nv3jKKvb002TITB5Zz";
\Stripe\Stripe::setApiKey($stripe_secret_key);

try {
    include ('conexao.php');
    
      
    $id = $_SESSION['id_produto'];
    $smtm = $conexao->prepare("SELECT id,nome, preco,foto from produto WHERE id = $id");
    $smtm ->execute();
    
    $resultados = $smtm->fetchAll(PDO::FETCH_ASSOC);
    if($resultados){
        foreach($resultados as $user){
            $nome = $user["nome"];
            $preco = $user["preco"];
            $preco_int = intval($preco * 100); // Converte para centavos
          $foto = $user["foto"];
          var_dump($nome, $preco, $preco_int);

        }
    }
    
   $checkout_session = \Stripe\Checkout\Session::create([

        "mode" => "payment",
        "success_url" => "http://localhost/aula_06/success.php",
        "cancel_url" => "http://localhost/aula_06/pagVendas.php",  // Adicione uma URL de cancelamento
        "line_items" => [[
            "quantity" => 1,
            "price_data" => [
                "currency" => "brl",
                "unit_amount" => $preco_int,
                "product_data" =>[
                    "name" => $nome,
                    "images" => [$foto]
                ]
            ]
        ]]
    ]);

    http_response_code(303);    
    header ("Location: " . $checkout_session->url);
} catch (Exception $e) {
    http_response_code(500);
    echo 'Erro: ' . $e->getMessage();
}

?>
