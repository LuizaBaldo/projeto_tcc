<?php
    require_once './functions.php';
?>

<?php
    function buscaAnimalId($id){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from animal where id = $id ";
        $retorno = mysqli_query($con, $sql);
        $animal = mysqli_fetch_array($retorno);
        return $animal;
    }
    $animal = buscaAnimalId($_GET['id']);
?>

<?php
    function listaComentarioDoAnimal($id_animal){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from comentario where id_animal = $id_animal ";
        $rows = array();
        $retorno = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
    }
    $comentarios = listaComentarioDoAnimal($_GET['id']);
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
                            echo 'tipo do animal: '.$animal['tipo_animal'];
                            echo '<br>';
                            echo 'nome do animal: '.$animal['nome_animal'];
                            echo '<br>';
                            echo 'idade do animal: '.$animal['idade'];
                            echo '<br>';
                            echo 'sexo do animal: '.$animal['sexo']; 
                            echo '<br>';
                            echo 'raça do animal: '.$animal['raca'];
                            echo '<br>';
                            echo 'descrição do animal: '.$animal['descricao'];
                        echo '</div>';
                    echo '</div>';
                ?>
            </div>
        </div>
        <div class="container">
            <form method="post" action="guardar_comentario.php" style="display: flexbox ">
                <input type="text" name="nome" placeholder="nome" style="width: 22%">
                <br>
                <input type="text" name="email" placeholder="email" style="width: 22%">
                <br>
                <textarea id="comentario" name="comentario" rows="5" cols="33" placeholder="Digite seu comentario"></textarea>
                <br>
                <input id="submit" type="submit" value="Comentar" style=" width: 10%;">
                <input type="hidden" name="id_animal" value="<?php echo $animal['id']?>">
            </form>
        </div>

        <div class="container">
            
                <?php
                    foreach ($comentarios as $comentario){
                    echo '<div class="row" style="background-color:;">';     
                    echo $comentario['nome'];
                    echo '<br>';
                    echo $comentario['conteudo'];
                    echo '</div>';
                    }
                ?>

            </div>

        </div>
    
        
    </body>
</html>

