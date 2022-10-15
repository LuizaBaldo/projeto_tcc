<?php

    require_once './functions.php';

    if(isset($_SESSION["id"])==false){
        header("location: pag_login.php");
        exit();

    }
    $user = getUserLogged($_SESSION["id"]);
    if($user["tipo"] =='INSTITUICAO'){
        header("location: pag_inicial.php");
        exit();
    }
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
        
        <div class="container_usuario" style="padding-left: 20rem; padding-top: 2rem;">
            <div class="card w-75 p-0" style="background-color: #66C4A9; height: 34rem;">
                <div class="row">
                    <div class="col-4">
                        <div class="container_img" style="text-align: center; padding-left: 3rem;">
                            <img class="card-img-left" src="../img/img_avatar1.png" alt="Card img" id="usuario_foto" style="width: 300px; padding-top: 1rem;">
                        </div>
                        
                        <div class="container_buttoms" style="text-align: center; padding-left: 6rem;">
                            <a href="pag_alt_dados.php">
                                <button type="button" class="btn mt-3 mb-1" id="btnAltCadastrar" name="btnAltCadastrar" style="background-color: #4C79D5; color: white;">Alterar Cadastro</button>  
                            </a>
                            <p>
                            <p>
                            <a href="pag_alt_senha.php">
                                <button type="button" class="btn mb-1" id="btnAltSenha" name="btnAltSenha" style="background-color: #4C79D5; color: white;">Alterar Senha</button>                        
                            </a>                 
                            <p>
                            <form method="post" onsubmit="return confirm('Você tem certeza que deseja apagar este perfil?');" action="pag_usuario.php?deletar=<?php echo $user['id'];?>">
                                <button type="submit" class="btn" id="btnExcluir" name="btnExcluir" style="background-color: #4C79D5; color: white;">Excluir Perfil</button>
                            </form>                            
                        </div>                        
                    </div>

                    <div class="col-4">                            
                        <div class="container_info" style="padding: 100px; width: 600px;"> <!-- -->
                            <label>Nome</label> 
                            <input  type="text" class="form-control" id="txtNome" name="nome" disabled="true" value="<?php echo $user["nome"];?>"/>

                            <label>E-mail</label>
                            <input type="email" class="form-control" id="txtEmail" name="email" disabled="true" value="<?php echo $user["email"];?>"/>

                            <label>Endereço</label>
                            <input type="text" class="form-control" id="txtEndereco" name="endereco" disabled="true" value="<?php echo $user["endereco"];?>"/>

                            <label>Telefone</label>
                            <input type="text" class="form-control" id="nrTelefone" name="telefone" disabled="true" value="<?php echo $user["telefone"];?>"/>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
            
              if(isset($_GET["deletar"])) excluir();{
                
              }
            ?>
        </div>

    </body>
</html>

<?php 
    function excluir(){
        $id = $_GET['deletar'];
        $con  = new mysqli("localhost", "root", "", "tcc");
        $sql = "delete from usuario where id = $id";
        mysqli_query($con, $sql);
        echo "<script lang='javascript'>window.location.href='sair.php';</script>";
        mysqli_close($con);
    }
?>