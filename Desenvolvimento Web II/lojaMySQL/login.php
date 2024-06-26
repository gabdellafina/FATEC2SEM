<?php

if(isset($_POST['login'])){

  require 'conexao.php';

  $email = $_POST['email'];
  $senha2 = $_POST['senha'];

$stmt2 = $conexao->prepare("SELECT senha FROM usuario WHERE email = '$email'");
$stmt2->execute();
$senha_bd = $stmt2->fetchColumn();

if(password_verify($senha2, $senha_bd)){
  session_start();
  $_SESSION['nome']=$email;
  header('Location: cadastro.php');
} else {
    echo "Usuário ou senha inválidos!";
}


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

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

              <form action="" method="POST">
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg" name="senha"/>
                  <label class="form-label" for="typePasswordX">Senha</label>
                </div>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
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

