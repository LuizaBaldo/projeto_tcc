<?php
    require_once './functions.php';
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
    <link rel="stylesheet" href="../css/pag_login.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->
    <script lang="javascript" src="../js/pag_login.js"></script>  
    
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
        <div class="container_main">
          <div class="row justify-content-around">
            <!-- CONTAINER LOGIN -->
            <div class="container_login col-4" id="jaCadastroDiv" style="background-color: #66C4A9;">
              <p class="display-6" id="jaCadastro" style="color: white;">Login</p>
                <form method="post" action="pag_login.php?logar=1" class="needs-validation" id="formLogin">
                    <div class="mb-3" id="divEmail">
                      <label class="form-label" for=txtEmailLogin style="color: white;">E-mail</label>
                      <input type="email" class="form-control" id="txtEmailLogin" name="email" required />
                    </div>

                    <div class="mb-3" id="divSenha">
                      <label class="form-label" for="txtSenhaLogin" style="color: white;">Senha</label>
                      <input type="password" class="form-control" id="txtSenhaLogin" name="senha" required />
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto" id="divBotaoLogar">
                      <button type="button" class="btn mt-3" id="btnLogar" onclick="validaLogin();" style="background-color: #4C79D5; color: white;">Logar</button>
                    </div>
                </form>

                <?php
                  if(isset($_GET["logar"])) logarUsuario();
                ?>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <p></p>
                    <a href="Pag_Esq_Senha.html" id="esqueciSenha" class="btn btn-link" style="background-color: #4C79D5; color: white;">Esqueci a senha</a>
                </div>
            </div>
            <!-- CONTAINER CADASTRO -->
            <div class="container_cadastro col-4" id="cadastro" style="background-color: #66C4A9;">
              <p class="display-6" id="jaCadastro" style="color: white;">Cadastro</p>
                <div class="d-grid gap-2">
                    <a href="pag_cadastro_instituicao.php" class="btn btn-lg" id="btnCadInst" style="background-color: #4C79D5;">Cadastrar Instituição</a>
                    <a href="pag_cadastro_usuario.php" class="btn btn-lg" id="btnCadUsu" style="background-color: #4C79D5;">Cadastrar Usuário</a>
                </div>
            </div>            
          </div>
        </div>

=======

        <div class="container row" id="jaCadastroDiv">
          <p class="display-6" id="jaCadastro">Já tenho cadastro</p>
            <form method="post" action="pag_login.php?logar=1" class="needs-validation" id="formLogin">
                <div class="mb-3" id="divEmail">
                  <label class="form-label" for=txtEmailLogin>E-mail</label>
                  <input type="email" class="form-control" id="txtEmailLogin" name="email" required />
                </div>

                <div class="mb-3" id="divSenha">
                  <label class="form-label" for="txtSenhaLogin">Senha</label>
                  <input type="password" class="form-control" id="txtSenhaLogin" name="senha" required />
                </div>
                <div class="d-grid gap-2 col-4 mx-auto" id="divBotaoLogar">
                  <button type="button" class="btn mt-3" id="btnLogar" onclick="validaLogin();" style="background-color: #66C4A9; color: white;">Logar</button>
                </div>
            </form>

            <?php
              if(isset($_GET["logar"])) logarUsuario();
            ?>
            <div class="d-grid gap-2 col-4 mx-auto">
                <a href="Pag_Esq_Senha.html" id="esqueciSenha" class="btn btn-link" style="color: #4C79D5;">Esqueci a senha</a>
            </div>
        </div>

        <div class="container row" id="cadastro">
            <div class="d-grid gap-2">
                <a href="pag_cadastro_instituicao.php" class="btn btn-lg" id="btnCadInst" style="background-color: #66C4A9; color: white;">Cadastrar Instituição</a>
                <a href="pag_cadastro_usuario.php" class="btn btn-lg" id="btnCadUsu" style="background-color: #66C4A9; color: white;">Cadastrar Usuário</a>
            </div>
        </div>
>>>>>>> d0c92b6b452468fcc630a1a6c5ff66a84bd36b57
        

    </body>
</html>

<?php
  function logarUsuario(){
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $con = new mysqli("localhost", "root", "", "tcc");
    $sql = "select * from usuario where email='$email' and senha='$senha'";
    $retorno = mysqli_query($con, $sql);
    if($reg = mysqli_fetch_array($retorno)){
      $_SESSION["id"] = $reg["id"];
      $id = session_id();
      
      echo "<script lang='javascript'>window.location.href='pag_inicial.php?';</script>";
    } else {
      echo "<br> <center> <h3 style='margin-top:20px;'>E-mail ou senha inválidos!</h3></center>";
    }
    mysqli_close($con);    
  }
?>