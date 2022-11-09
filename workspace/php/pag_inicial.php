<?php
    require_once './functions.php';
?>

<?php
    function getInstituicoes() {
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "SELECT * FROM usuario u  WHERE u.tipo = 'INSTITUICAO'";
        $retorno = mysqli_query($con, $sql);
        $rows = array();
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
    }
    $instituicoes = getInstituicoes($_GET['filtro'] ?? null)
?>

<?php
    function getAnimais() {
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "SELECT * FROM animal a";
        $retorno = mysqli_query($con, $sql);
        $rows = array();
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
    }
    $animais = getAnimais($_GET['filtro'] ?? null)
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- icons font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- css -->
    <link rel="stylesheet" href="../css/pag_inicial.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->
    <script lang="javascript" src="../js/redirecionaLogin.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adot.org</title>
</head>
    <body>

        <?php
            require_once './partials/common.php';
        ?>

        <div class="container_main">
            <div class="d-flex flex-wrap align-content-center">
                <?php foreach ($instituicoes as $instituicao){

                    echo '<div class="container_exibir p-5">';
                        echo '<div class="row">';
                            echo '<div class="card" style="width:300px">';
                                echo '<img class="card-img-top" src="'.$instituicao['pathImagem'].'" alt="Card image">';
                                echo '<div class="card-body">';
                                    echo '<h4 class="card-title">' .$instituicao['nome']. '</h4>';
                                    echo '<p class="card-text">' .$instituicao['endereco']. '</p>';
                                    echo '<p>';
                                    echo '<a href="pag_exibir_instituicao.php?id='.$instituicao['id'].'" ; style="text-decoration: none; color:inherit;">Veja Mais</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                }?>

                <?php foreach($animais as $animal){

                    echo '<div class="container_exibir p-5">';
                        echo '<div class="row">';
                            echo '<div class="card" style="width:300px">';
                                echo '<img class="card-img-top" src="'.$animal['pathImagem_animal'].'" alt="Card image">';
                                echo '<div class="card-body">';
                                    echo '<h4 class="card-title">Nome: ' .$animal['nome_animal']. '</h4>';
                                    echo '<p class="card-text">Raça: ' .$animal['raca']; '</p>';
                                    echo '<p>';
                                    echo '<a href="pag_animal.php?id='.$animal['id'].'" ; style="text-decoration: none; color:inherit; ">Veja Mais</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                }?>
                
                
            </div>
        </div>

    </body>
</html>