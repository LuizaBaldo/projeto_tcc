<?php
    require_once './functions.php';
?>

<?php
    function buscaInstituicaoId($id){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where id = $id ";
        $retorno = mysqli_query($con, $sql);
        $instituicao = mysqli_fetch_array($retorno);
        return $instituicao;
    }
    $instituicao = buscaInstituicaoId($_GET['id']);
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
    <link rel="stylesheet" href="../css/pag_animal.css">
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
        <div class="container"> 
            <div class="d-flex flex-wrap align-content-center">
                <?php 
                    echo "<div class='col-6 text-center p-3 '>";
                        echo "<div class='border'>";
                            echo '<h2>';
                            echo 'nome da instituicao: '.$instituicao['nome'];
                            echo '<br>';
                            echo 'nome da instituicao: '.$instituicao['endereco'];
                            echo '<br>';
                            echo 'telefone da instituicao: '.$instituicao['telefone'];
                            echo '<br>';
                            echo 'email da instituicao: '.$instituicao['email']; 
                            echo '<br>';
                            echo 'cnpj da instituicao: '.$instituicao['cnpj'];
                        echo '</div>';
                    echo '</div>';
                ?>
            </div>
        </div>
    </body>
</html>

