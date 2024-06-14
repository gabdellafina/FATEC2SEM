<?php

    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $anoNasc = $_POST['anoNasc'];
        $sexo = $_POST['sexo'];
        $arrayInt = $_POST['interesses'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cor = $_POST['cor'];
        $destino = 'img/' . $_FILES['foto']['name'];
        $sobre = $_POST['bio'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
        $idade = date('Y') - $anoNasc;
    }

    $iconMsc = 'img/musical-note.png';
    $iconEsp = 'img/football.png';
    $iconCin = 'img/video-camera.png';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylePerfil.css">
    <title>Perfil</title>
</head>
<body style="background-color: <?= $cor ?>">

    <div class="container d-flex justify-content-around align-items-center mt-5">
        <div class="row">
            <div class="col text-center text-primary-emphasis bg-primary-subtle">
                <h1><?= $nome ?></h1>
                <img src="<?= $destino ?>" alt="foto de perfil" width="200" class="rounded-circle mb-3">
                <h3><?= $cidade ?>, <?= $estado ?></h3>
            </div>
        </div>
        <div class="row d-block">
            <div class="col text-primary-emphasis bg-primary-subtle mb-5">
                <h5 class="mb-3">Idade: <?= $idade ?></h5>
                <h5 class="mb-3">Sexo: <?= $sexo ?></h5>
                <h5 class="mb-3">Interesses: <br> 
                <?php
                foreach ($arrayInt as $interesse) {
                    if ($interesse == 'Música') {
                        echo '<img src="' . $iconMsc . '" width="20" style="margin-right: 10px">' . $interesse . '<br>';
                    } elseif ($interesse == 'Esportes') {
                        echo '<img src="' . $iconEsp . '" width="20" style="margin-right: 10px">' . $interesse . '<br>';
                    } elseif ($interesse == 'Cinema') {
                        echo '<img src="' . $iconCin . '" width="20" style="margin-right: 10px">' . $interesse . '<br>';
                    }
                } 
                ?></h5>
            </div>
            <hr>
            <div class="col text-primary-emphasis bg-primary-subtle mt-5">
                <h4>Sobre mim:</h4>
                <p><?= $sobre ?></p>
            </div>
        </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>