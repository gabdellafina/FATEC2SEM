<?php
    if ($_POST) {
        if (isset($_POST['anotacao']) && isset($_POST['titulo'])) {
            $anotacao = $_POST['anotacao'];
            $titulo = $_POST['titulo'];
            $titulo_novo = str_replace(" ", "_", $titulo);
            $nome_arq = $titulo_novo . ".txt";
            $path = "anotacoes/" . $nome_arq;
            file_put_contents($path, $anotacao);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Anotações</title>
</head>
<body>

    <div class="container mt-5">
        <div class="container">
            <h1 class="display-3">Suas anotações</h1>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal">Nova anotação</button>
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Nova anotação</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="titulo" id="titulo" class="form-control mb-3" placeholder="Título"> 
                                <textarea name="anotacao" id="anotacao" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-warning">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row g-3">
        <?php
            $anotacoes_dir = 'anotacoes/';
            $arquivos = scandir($anotacoes_dir);
            foreach ($arquivos as $arquivo) {
                if ($arquivo == '.' || $arquivo == '..') continue;
                $titulo = pathinfo($arquivo, PATHINFO_FILENAME);
                $modal_id = 'modal_' . $titulo; 
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $titulo . '</h5>';
                echo '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#' . $modal_id . '">Visualizar</button>
                    <div class="modal fade" id="' . $modal_id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="' . $modal_id . 'Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>' . file_get_contents($anotacoes_dir . $arquivo) . '</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                    </div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>