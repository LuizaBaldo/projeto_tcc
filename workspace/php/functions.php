<?php
    session_start();
    function getUserLogged(){
        if(isset($_SESSION["id"])==false){
            return null;
        }
        $id = $_SESSION['id'];
        $con = new mysqli("localhost", "root", "", "tcc");
        $retorno = mysqli_query($con, "select * from usuario where id='$id'");
        return mysqli_fetch_array($retorno);
    }

    function buscaAnimalPorId($id){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from animal where id = $id ";
        $retorno = mysqli_query($con, $sql);
        $animal = mysqli_fetch_array($retorno);
        return $animal;
    }
    
    function buscaInstituicaoId($id){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where id = $id ";
        $retorno = mysqli_query($con, $sql);
        $instituicao = mysqli_fetch_array($retorno);
        return $instituicao;
    }

    function imprimirAnimais($animais){
        foreach ($animais as $animal){
            $nome_animal = $animal['nome_animal'];
            $raca = $animal['raca'];
            // TESTE CARD 
            echo '<div class="container_exibir p-5">';
                echo '<div class="row">';
                    echo '<div class="card" style="width:300px">';
                        echo '<img class="card-img-top" src="'.$animal['pathImagem_animal'].'" alt="Card image">';
                        echo '<div class="card-body">';
                            echo '<h4 class="card-title">Nome: ' .$nome_animal; '</h4>';
                            echo '<p class="card-text">Raça: ' .$raca; '</p>';
                            echo '<p>';
                            echo '<a href="pag_animal.php?id='.$animal['id'].'" ; style="text-decoration: none; color:inherit; ">Veja Mais</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
?>
    