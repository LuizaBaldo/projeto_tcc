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
            echo "<div class='col-6 text-center p-3 '>";
                echo '<a href="pag_animal.php?id='.$animal['id'].'" ; style="text-decoration: none; color:inherit; ">';
                    echo "<div class='border'>";
                        echo "<img height='100' src= ".$animal['pathImagem'].">";
                        echo '<br>';
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
        }
    }
?>
    