<?php
    require_once './functions.php';
    if(isset($_SESSION["id"])==false){
        header("location: pag_login.php");
        exit();
    }
    $user = getUserLogged($_SESSION['id']);
    if($user["tipo"] == 'USUARIO'){
        header("location: pag_inicial.php");
        exit();
    }
?>

<?php
    function getAnimal($user){
        $id = $user['id'];
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from animal where id_usuario = '$id'";
        $retorno = mysqli_query($con, $sql);
        $rows = array();
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
<<<<<<< HEAD
        

    }
    $animais = getAnimal($user);

    
=======
    }
    $animais = getAnimal($user);
>>>>>>> d0c92b6b452468fcc630a1a6c5ff66a84bd36b57
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
<<<<<<< HEAD
        <div class="container"> 
            <div class="d-flex flex-wrap align-content-center">
                <?php foreach ($animais as $animal){
                    echo "<div class='col-4 text-center'> ";
                    echo 'tipo do animal: '.$animal['tipo_animal'];
                    echo '<br>';
                    echo 'nome do animal: '.$animal['nome_animal'];
                    echo '<br>';
                    echo 'idade do animal: '.$animal['idade'];
                    echo '<br>';
                    echo 'sexo do animal: '.$animal['sexo']; 
                    echo '<br>';
                    echo 'raça do animal: '.$animal['raca'];
                    echo '</div>';
                }?>

=======

        <div class="container"> 
            <div class="d-flex flex-wrap align-content-center">
                <?php foreach ($animais as $animal){
                    echo "<div class='col-6 text-center p-3 '>";
                        echo '<a href="pag_animal.php?id='.$animal['id'].'" ; style="text-decoration: none; color:inherit; ">';
                            echo "<div class='border'>";
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
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }?>
>>>>>>> d0c92b6b452468fcc630a1a6c5ff66a84bd36b57
            </div>
        </div>



<<<<<<< HEAD

=======
>>>>>>> d0c92b6b452468fcc630a1a6c5ff66a84bd36b57
    </body>
</html>