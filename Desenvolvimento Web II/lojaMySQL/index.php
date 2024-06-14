<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="produto.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$(".wish-icon i").click(function(){
		$(this).toggleClass("fa-heart fa-heart-o");
	});
});	
</script>
</head>
<?php 

require "conexao.php";

 $stmt = $conexao->prepare("SELECT nome,preco,foto FROM produto ORDER BY id DESC LIMIT 4"); 	
 $stmt->execute();

 $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
<div class="container-xl">
    <div class="row">
        <div class="col-md-12">
            <h2><b>Produtos</b></h2>
            <form action="login.php" method="POST">

<button class="btn btn-outline-light btn-lg px-5" type="submit" name="login2">Login</button>
</form>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>   
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php
                            $count = 0;
                            foreach ($resultado as $produto) {
                                if ($count < 4) {
                                    $nomeProduto = $produto["nome"];
                                    $preco = $produto["preco"];
                                    $caminho_imagem = $produto["foto"];
                            ?>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="<?php echo $caminho_imagem; ?>" class="img-fluid">
                                        </div>
                                        <div class="thumb-content">
                                            <h4><?php echo $nomeProduto; ?></h4>                                    
                                            <p class="item-price"><b><?php echo $preco; ?></b></p>
                                            <a href="#" class="btn btn-primary">Compre</a>
                                        </div>                      
                                    </div>
                                </div>
                            <?php
                                    $count++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php
                            foreach ($resultado as $produto) {
                                if ($count >= 4 && $count < 8) {
                                    $stmt = $conexao->prepare("SELECT nome,preco,foto FROM produto ORDER BY id LIMIT 4"); 	
                                    $stmt->execute();
                                    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $nomeProduto = $produto["nome"];
                                    $preco = $produto["preco"];
                                    $caminho_imagem = $produto["foto"];
                            ?>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="<?php echo $caminho_imagem; ?>" class="img-fluid">
                                        </div>
                                        <div class="thumb-content">
                                            <h4><?php echo $nomeProduto; ?></h4>                                    
                                            <p class="item-price"><b><?php echo $preco; ?></b></p>
                                            <a href="#" class="btn btn-primary">Compre</a>
                                        </div>                      
                                    </div>
                                </div>
                            <?php
                                    $count++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
</html>
</html>                                		