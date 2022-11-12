<?php
    require_once './functions.php';
    $user = getUserLogged();
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
            <h3 style="text-align: center;">Esqueci a Senha</h3>
            <form method="post" action="pag_esqueci_senha.php?enviar=1" id="formEsqueci">
                <label class="form-label">Insira seu e-mail</label>
                <input class="form-control form-control-sm" id="txtEmail" name="txtEmail" type="email" required/>
                <button type="submit" name="enviaEmail" class="btn mt-3" style="background-color: #4C79D5; color: white; width:100%">Enviar Email</button>
            </form>
        </div>
        <?php
            if(isset($_GET["enviar"])) enviarEmail();{

            } 
        ?>
    </body>
</html>
<?php 
    function enviarEmail(){
        $email = $_POST["txtEmail"];
        var_dump($email);
        $con  = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where email='$email'";
        $query = mysqli_query($con, $sql);
        var_dump($query);
        if(mysqli_num_rows($query) > 0){
            $codigo = rand(999999, 111111);
            var_dump($codigo);
            $inserir_codigo = "UPDATE usuario SET codigo = $codigo WHERE email = $email";
            $run_query =  mysqli_query($con, $inserir_codigo);
            if($run_query){
                $subject = "Codigo para resetar a senha";
                $mensagem = "Seu codigo para resetar a senha é $codigo";
                $remetente = "From: tccadotorg2022@gmail.com";
                if(mail($email, $subject, $mensagem, $remetente)){
                    header('location: pag_reset_codigo.php');
                    exit();
                }else{
                    echo "<span>Falha ao enviar o codigo</span>";
                }
            }else{
                echo "<span>Alguma coisa deu errado</span>";
            }
        }else{
            echo "<span>E-Mail não existe</span>";
            echo "<br>";
        }
                
    }

?>