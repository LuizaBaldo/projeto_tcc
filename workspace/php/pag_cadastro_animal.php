<?php session_start(); ?>

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
    <link rel="stylesheet" href="../css/pag_cadastro_usuario.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->
    <script lang="javascript" src="../js/pag_cadastro_animal.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adot.org</title>
</head>
    <body>

        <?php
            require_once './partials/common.php';
        ?>
        <div class="container">
            <h1 class="text-center">Cadastrar Animal</h1>
            <div id="formulario">
                <form method="post" action="pag_cadastro_animal.php?salvar=1" id="formCadastro">

                <div class="form" style="width:70%;margin:auto;">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nome do Animal</label>
                            <input type="text" class="form-control" id="txtNome" placeholder="Digite o nome do animal" name="nome_animal"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Idade do Animal</label>
                            <input type="text" class="form-control" id="txtIdade" placeholder="Digite a idade do animal" name="idade"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sexo do Animal</label>
                            <input type="text" class="form-control" placeholder="Digite o sexo do animal" id="txtSexo" name="sexo"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Raça do Animal</label>
                            <input type="text" class="form-control" placeholder="Digite a raça do animal" id="txtRaca" name="raca"/>
                        </div> 

                        <div class="mb-3">
                            <label class="form-label">Descrição do Animal</label>
                            <input type="text" class="form-control" placeholder="Digite uma breve descrição do animal" id="txtDescricao" name="descricao"/>
                        </div>

                    </div>

                    <br/>

                    <div class="mb-3">
                        <div class="d-grid gap-2 col-6 mx-auto" style="background-color: #66C4A9;">
                            <button type="button" class="btn text-white" id="btnCadastrar" name="btnCadastrar" onclick="validar();">Cadastrar</button>
                        </div>
                    </div>

                </div>
                </form>
                
                <?php
                if(isset($_GET["salvar"])) cadastrarAnimal();
                ?>
            </div>
        </div>
        
    </body>
</html>

<?php
  function cadastrarAnimal(){
    $nome_animal  = $_POST["nome_animal"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $raca = $_POST["raca"];
    $descricao = $_POST["descricao"];
    
    $con    = new mysqli("localhost", "root", "", "tcc");
    $sql    = "insert into animal(nome_animal, idade, sexo, raca, descricao) values ('$nome_animal', '$idade', '$sexo', '$raca', '$descricao')";
    mysqli_query($con, $sql);
    echo "<script lang='javascript'>window.location.href='pag_instituicao.php';</script>";
    mysqli_close($con);
  }
?>

