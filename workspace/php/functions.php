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

    function buscaInstituicaoNome($nome){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where nome = $nome ";
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
                    echo '<div class="card">';
                        echo '<img class="img_imprimir_animais card-img-top pt-3" src="'.$animal['pathImagem_animal'].'" alt="Card image">';
                        echo '<div class="card-body text-center">';
                            echo '<p class="card-title">Nome: <span class="lead">' .$nome_animal. '</span></p>';
                            echo '<p class="card-text">Raça: <span class="lead">' .$raca; '</span></p>';
                            echo '<p>';
                            echo '<div class="text-center"><a class="btn btn-primary stretched-link" href="pag_animal.php?id='.$animal['id'].'">Veja Mais</a></div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }

    function excluir(){
        $id = $_GET['deletar'];
        $con  = new mysqli("localhost", "root", "", "tcc");
        $sql = "delete from usuario where id = $id";
        mysqli_query($con, $sql);
        echo "<script lang='javascript'>window.location.href='sair.php';</script>";
        mysqli_close($con);
    }

    function excluirAnimal(){
        $idInstituicao = $_GET['instituicaoid'];
        $id = $_GET['deletar'];
        $con  = new mysqli("localhost", "root", "", "tcc");
        $sql = "delete from animal where id = $id";
        mysqli_query($con, $sql);
        echo "<script lang='javascript'>window.location.href='pag_instituicao.php?id=$idInstituicao';</script>";
        mysqli_close($con);
    }
?>
    