
<?php

session_start();

if(isset($_SESSION['nome'])){
  echo $_SESSION['nome'];

  if(isset($_POST['submit'])){


    require "conexao.php";
header('location:cadastro.php');

    $nomeProduto = $_POST["_nmProduto"];
    $preco = $_POST["_preco"];
    $diretorio = "uploads/";
    $caminho = $diretorio . basename($_FILES["fl_upload"]["name"]);

    $sql = "INSERT INTO produto(nome,preco,foto) VALUES ('$nomeProduto','$preco','$caminho')";

    move_uploaded_file($_FILES["fl_upload"]["tmp_name"],$caminho);

    if($conexao->query($sql)){
      echo "<script>alert('Produto registrado')</script>";
      header('location:index.php');
    }else{
      echo "<script>alert('NÃO Produto registrado')</script>";
    }

  }

}else{ 
header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Cadastre um novo produto</h2>

              <form action="" method="POST" enctype="multipart/form-data">
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" name="_nmProduto" id="nmProduto" class="form-control form-control-lg" />
                  <label class="form-label" for="nmProduto">Nome do produto</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="number" name ="_preco" id="preco" class="form-control form-control-lg" />
                  <label class="form-label" for="preco">Preço</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <label for="formFileLg" class="form-label">Foto do produto</label>
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="fl_upload">
              </div>
                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Enviar</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
</body>
</html>
