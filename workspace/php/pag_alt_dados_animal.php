<?php
    require_once './functions.php';
?>

<?php
    if(isset($_GET["alterar"])){
        $id = $_GET['alterar'];
        $nome = $_POST["nomeAnimal"];
        $tipo   = $_POST["tipoAnimal"];
        $idade  = $_POST["idade"];
        $sexo = $_POST["sexo"];
        $raca = $_POST["raca"];
        $descricao = $_POST["descricao"];
        $con  = new mysqli("localhost", "root", "", "tcc");
        $sql  = "UPDATE animal SET tipo_animal=? , nome_animal=?, idade= ?, sexo=? ,raca=? ,descricao=? WHERE id=?";
        $statement = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($statement, 'sssssss', $tipo, $nome, $idade, $sexo, $raca, $descricao, $id);
        mysqli_stmt_execute($statement);
        mysqli_close($con);
        header("location: pag_animal.php?id=$id");

    }
?>

<?php
    $animal = buscaAnimalPorId($_GET['id']);
    $instituicao = buscaInstituicaoId($animal['id_usuario']);
?>

<?php 
    if (isset($_FILES["arquivo"])) {
        $arquivo = $_FILES['arquivo'];
        // Validar se o arquivo não esta vazio
        if (!empty($arquivo["name"])) {
            $nomeDoArquivo = $arquivo["name"];
    
            $arquivoValido = true;
    
            // validar extensao do arquivo
            $tipoDoArquivo = array(
                'jpg',
                'jpeg',
                'png'
            );
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $pasta = '../img/';
            $extensaoDoArquivo = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            if (! in_array($extensaoDoArquivo, $tipoDoArquivo)) {
                echo "<span>Formato de arquivo não suportado. somente upload<b>" . implode(", ", $tipoDoArquivo) . "</b> arquivos .</span>";
                $arquivoValido = false;
            }
    
            // Validate file size
            if ($_FILES["arquivo"]["size"] > 200000) {
                echo "<span>Arquivo muito grande Max:2MB.</span>";
                $arquivoValido = 0;
            }
            
            $path = $pasta . $novoNomeDoArquivo . "." . $extensaoDoArquivo;
    
            if ($arquivoValido) {
                move_uploaded_file($arquivo["tmp_name"], $path);
                $con  = new mysqli("localhost", "root", "", "tcc");
                $sql = "update animal set pathImagem_animal = ? where id = {$animal['id']}";
                $statement = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($statement, 's', $path);
                mysqli_stmt_execute($statement);
                mysqli_close($con);
                echo "<script lang='javascript'>window.location.href='pag_animal.php?id=".$animal['id']."';</script>";
            }
            else{
                echo "falha ao enviar arquivo";
            }
        } else 
            echo "No files have been chosen.";
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
    <link rel="stylesheet" href="../css/pag_cadastro_animal.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->
    <script lang="javascript" src="../js/pag_alterar_dados_animal.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adot.org</title>
    
</head>
    <body>
        <?php
            require_once './partials/common.php';
        ?>
        <div class="row rounded py-2" style="background-color: #66C4A9;">

            <div class="col-4">
                <img src="<?php echo $animal['pathImagem_animal']?>" style="width:100%">
                <form action="" method="POST" enctype="multipart/form-data">
                    <p><label>Selecione o arquivo:</label></p>
                    <input name="arquivo" type="file"></p>
                    <button name="upload" type="submit"> Enviar arquivo</button>
                </form>  
            </div>

            <div class="col-8">              
                <div class="animal_info" style="padding: 0 15px 0 15px;width: 70%">
                    
                    <form method="post" action="pag_alt_dados_animal.php?id=<?php echo $animal["id"]?>&alterar=<?php echo $animal["id"];?>" id="formAlterarInfoAnimal" >
                        <label>Tipo do Animal</label> 
                        <input  type="text" class="form-control" id="txtTipoAnimal" name="tipoAnimal"  value="<?php echo $animal["tipo_animal"];?>"/>

                        <label>Nome</label>
                        <input type="email" class="form-control" id="txtNomeAnimal" name="nomeAnimal"  value="<?php echo $animal["nome_animal"];?>"/>

                        <label>Idade</label>
                        <input type="text" class="form-control" id="txtIdade" name="idade"  value="<?php echo $animal["idade"];?>"/>

                        <label>Sexo</label>
                        <input type="text" class="form-control" id="txtSexo" name="sexo"  value="<?php echo $animal["sexo"];?>"/>

                        <label>Raça</label>
                        <input type="text" class="form-control" id="txtRaca" name="raca"  value="<?php echo $animal["raca"];?>"/>

                        <label>Descrição</label>
                        <textarea type="text" class="form-control" id="txtDescricao" name="descricao"><?php echo $animal["descricao"];?></textarea>

                        <button type="button" class="btn btn-primary mt-3 mb-1" id="btnAltAnimal" name="btnAltAnimal" style="center" onclick="alterarInfoAnimal();">Salvar alteracoes</button>
                        <button type="button" class="btn btn-danger mt-3" id="btnCancelarCadastro" name="btnCancelarCadastro" onclick="voltar()">Cancelar</button>
                    </form>
                    
                </div>
            </div>
        </div>       
    </body>
</html>


<script lang='javascript'>
    function voltar(){
        window.location.href='pag_animal.php?id=<?php echo $animal['id']?>';
    }
</script>
