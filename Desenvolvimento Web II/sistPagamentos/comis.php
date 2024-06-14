
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Funcionário</title>
</head>
<body>

    <nav class="navbar bg-success">
        <div class="container-fluid justify-content-around">
            <h1 class="text-light">Funcionário Comissionado</h1>
            <button class="btn btn-light">Sair</button>
        </div>
    </nav>
    <div class="container d-flex">
        <div class="container m-5">
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="cod" class="form-label">Código</label>
                <input type="text" class="form-control" id="cod" name="codigo">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor da Hora</label>
                    <input type="text" class="form-control" id="valor" name="valor">
                </div>
                <div class="mb-3">
                    <label for="horas" class="form-label">Horas Trabalhadas: </label>
                    <input type="text" class="form-control" id="horas" name="horas">
                </div>
                <div class="mb-3">
                    <label for="horas" class="form-label">Total de Vendas Realizadas: </label>
                    <input type="text" class="form-control" id="vendas" name="vendas">
                </div>
                <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
            </form>
        </div>
        <div class="container m-5">
            
        <?php

include "Funcionario.php";
include "Comissionado.php";

if($_POST){
    $codigo=$_POST['codigo'];
    $nome=$_POST['nome'];
    $valor=$_POST['valor'];
    $horas=$_POST['horas'];
    $vendas=$_POST['vendas'];

    $comi = new Comissionado($codigo,$nome,$valor,$horas,$vendas);

?>
            <h5>Folha de Pagamento:</h5>
            <div class="card" style="width: 18rem">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Código: <?php echo $comi->getCodigo();?></li>
                  <li class="list-group-item">Valor da Hora: <?php echo $comi->getValorHora();?></li>
                  <li class="list-group-item">Horas trabalhadas: <?php echo $comi->getHorasTrabalhadas();?></li>
                  <li class="list-group-item">Total de vendas:<?php echo $comi->getVendas();?></li>
                  <li class="list-group-item">Salário Líquido: <?php echo $comi->calcularSalario2($comi->getValorHora(),$comi->getHorasTrabalhadas(),$comi->getVendas());?></li>
                </ul>
              </div>
        </div>
    </div>

    <?php
}else{
    ?>

    <h5>Folha de Pagamento:</h5>
    <div class="card" style="width: 18rem">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Código:</li>
          <li class="list-group-item">Valor da Hora:</li>
          <li class="list-group-item">Horas trabalhadas:</li>
          <li class="list-group-item">Total de vendas:</li>
          <li class="list-group-item">Salário Líquido:</li>
        </ul>
      </div>
</div>
</div>

<?php

}
    ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>