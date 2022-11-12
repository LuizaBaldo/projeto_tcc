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
        <link rel="stylesheet" href="../css/pag_esqueci_senha.css">
        <link rel="stylesheet" href="../css/styles.css">
        <!-- js -->
        <!-- <script lang="javascript" src="../js/pag_esqueci_senha.js"></script>   -->
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adot.org</title>
    </head>
    <body>
        <?php
            require_once './partials/common.php';
        ?>
        <div class="container rounded p-3" style="background-color: #66C4A9; width: 30%; margin-top:10%;">
            <h3 style="text-align: center;">Nova Senha</h3>
            <form method="post" action="pag_esqueci_senha.php?enviar=1" id="formEsqueci">
                <label class="form-label">Insira uma nova senha que voce nao utilize em nenhum outro lugar</label>
                <input class="form-control form-control-sm mt-1 mb-1" placeholder="Nova senha" id="txtSenha" type="email" required />
                <input class="form-control form-control-sm" placeholder="Confirme a nova senha" id="txtConfirmaSenha" type="email" required />
                <button type="button" name="EnviaEmail" class="btn mt-3" onclick="validar();" style="background-color: #4C79D5; color: white; width:100%">Enviar</button>
            </form>
        </div>
    </body>
</html>
