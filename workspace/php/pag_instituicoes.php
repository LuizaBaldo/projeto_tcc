<?php
    require_once './functions.php';
?>

<?php
    function getInstituicoes() {
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where tipo = 'INSTITUICAO'";
        $retorno = mysqli_query($con, $sql);
        $rows = array();
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
    }
    $instituicoes = getInstituicoes()
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
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="../css/pag.css"> -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adot.org</title>
</head>
    <body>

        <!-- ========== TUDO QUE TEM "#" PRECISA COLOCAR UM LINK E MUDAR O PHP ========== -->
        <?php
            require_once './partials/common.php';
        ?>
        
        <div class="container_main"> 
            <div class="d-flex flex-wrap align-content-center">
                <?php foreach ($instituicoes as $instituicao){
                    $nome_inst = $instituicao['nome'];
                    $endereco_inst = $instituicao['endereco'];
                    // echo "<div class='col-6 text-center p-3 '>";
                    //     echo '<a href="pag_exibir_instituicao.php?id='.$instituicao['id'].'" ; style="text-decoration: none; color:inherit; ">';
                    //         echo "<div class='border'>";
                    //             echo 'Nome da instituicao: '.$instituicao['nome'];
                    //             echo '<br>';
                    //             echo 'endereco da instituicao: '.$instituicao['endereco'];
                    //             echo '<br>';
                    //             echo 'telefone da instituicao: '.$instituicao['telefone'];
                    //             echo '<br>';
                    //             echo 'email da instituicao: '.$instituicao['email']; 
                    //             echo '<br>';
                    //             echo 'cnpj da instituicao: '.$instituicao['cnpj'];
                    //         echo '</div>';  
                    //     echo '</a>';    
                    // echo '</div>';
                // TESTE CARD 
                echo '<div class="container_exibir p-5">';
                    echo '<div class="row">';
                        echo '<div class="card" style="width:300px">';
                            echo '<img class="card-img-top" src="../img/img_avatar1.png" alt="Card image">';
                            echo '<div class="card-body">';
                                echo '<h4 class="card-title">' .$nome_inst; '</h4>';
                                echo '<p class="card-text">' .$endereco_inst; '</p>';
                                echo '<p>';
                                echo '<a href="pag_exibir_instituicao.php?id='.$instituicao['id'].'" ; style="text-decoration: none; color:inherit;">Veja Mais</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';

                }?>

            </div>
        </div>

    </body>
</html>