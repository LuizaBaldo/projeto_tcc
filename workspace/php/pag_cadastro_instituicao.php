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
    <script lang="javascript" src="../js/pag_cadastro_instituicao.js"></script>

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
            <h1 class="text-center">Cadastrar Instituição</h1>
            <div id="formulario">
                <form method="post" action="pag_cadastro_instituicao.php?salvar=1" id="formCadastro">

                <div class="form" style="width:70%;margin:auto;">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" id="txtNome" placeholder="Digite o nome da instituição" name="nome_inst"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="txtEmail" placeholder="Digite o email da instituição" name="email_inst"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="txtCNJP" placeholder="Digite o CNPJ da instituição" name="cnpj"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" placeholder="Digite o endereço da instituição" id="txtEndereco" name="endereco_inst"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder="Digite o telefone da instituição" id="nrTelefone" name="telefone_inst"/>
                        </div> 

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" placeholder="Digite uma senha" id="txtSenha" name="senha_inst"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirme a senha</label>
                            <input type="password" class="form-control" placeholder="Confirme a senha" id="txtConfirSenha" name="confirmaSenha"/>
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
                if(isset($_GET["salvar"])) cadastrarInstituicao();
                ?>
            </div>
        </div>
        
    </body>
</html>

<?php
  function cadastrarInstituicao(){
    $nome_inst  = $_POST["nome_inst"];
    $endereco_inst = $_POST["endereco_inst"];
    $telefone_inst = $_POST["telefone_inst"];
    $cnpj = $_POST["cnpj"];
    $email_inst  = $_POST["email_inst"];
    $senha_inst  = $_POST["senha_inst"];
    
    $con    = new mysqli("localhost", "root", "", "tcc");
    $sql    = "insert into instituicao(nome_inst, endereco_inst, telefone_inst, cnpj, email_inst, senha_inst) values ('$nome_inst', '$endereco_inst', '$telefone_inst', '$cnpj', '$email_inst', '$senha_inst')";
    mysqli_query($con, $sql);
    echo "<script lang='javascript'>window.location.href='pag_login.php';</script>";
    mysqli_close($con);
  }
?>