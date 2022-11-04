<?php
    require_once './functions.php';
?>

<?php
    $animal = buscaAnimalPorId($_GET['id']);
    $instituicao = buscaInstituicaoId($animal['id_usuario']);
?>

<?php
    function listaComentarioDoAnimal($id_animal){
        $con = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from comentario where id_animal = $id_animal ";
        $rows = array();
        $retorno = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($retorno)) {
            $rows[] = $row;
        }
        return $rows;
    }
    $comentarios = listaComentarioDoAnimal($_GET['id']);
?>



<?php
    function UsuarioEhinstituicaoDoAnimal(){
        global $animal;
        $usuarioLogado = getUserLogged();
        if(!$usuarioLogado){
            return false;
        }
        if($usuarioLogado['id'] == $animal['id_usuario']){
            return true;
        }
        return false;
    }

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
    <link rel="stylesheet" href="../css/pag_animal.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- js -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adot.org</title>
</head>
    <body>

        <?php
            require_once './partials/common.php';
        ?>
        
        <div class="container_main">
            <div class="row" style="margin-right: 0;">
                <!-- CONTAINER IMG + INFO -->
                <div class="container_body">
                    <div class="row justify-content-center col-sm-12">
                        <div class="container_img col-3" style="background-color: #66C4A9; margin-left: 65px; margin-right: 10px;">
                            <img src="<?php echo $animal['pathImagem_animal']?>" style="width:100%">  
                            <?php if(UsuarioEhinstituicaoDoAnimal()){?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <p><label>Selecione o arquivo:</label></p>
                                    <input name="arquivo" type="file"></p>
                                    <button name="upload" type="submit"> Enviar arquivo</button>
                                </form>
                            <?php }?>
                            <h1><a href="pag_exibir_instituicao.php?id=<?= $instituicao['id']?>"><?php echo $instituicao['nome']?> </a></h1> <!-- MOSTRA A INSTIUICAO DO ANIMAL -->
                        </div>
                        
                        <div class="container_about col-6" style="background-color: #66C4A9;">  
                                                 
                            <div class="animal_info" style="padding: 0 15px 0 15px;width: 70%">
                                <label>Tipo do Animal</label> 
                                <input  type="text" class="form-control" id="txtTipoAnimal" name="tipoAnimal" disabled="true" value="<?php echo $animal["tipo_animal"];?>"/>

                                <label>Nome</label>
                                <input type="email" class="form-control" id="txtNomeAnimal" name="nomeAnimal" disabled="true" value="<?php echo $animal["nome_animal"];?>"/>

                                <label>Idade</label>
                                <input type="text" class="form-control" id="txtIdade" name="idade" disabled="true" value="<?php echo $animal["idade"];?>"/>

                                <label>Sexo</label>
                                <input type="text" class="form-control" id="txtSexo" name="sexo" disabled="true" value="<?php echo $animal["sexo"];?>"/>

                                <label>Raça</label>
                                <input type="text" class="form-control" id="txtRaca" name="raca" disabled="true" value="<?php echo $animal["raca"];?>"/>

                                <label>Descrição</label>
                                <input type="text" class="form-control" id="txtDescricao" name="descricao" disabled="true" value="<?php echo $animal["descricao"];?>"/>
                                
                            </div>
                        </div>                
                    </div>
                </div>
                <!-- CONTIANER REALIZAR COMENTARIO + COMENTARIO -->
                <div class="container_footer">
                    <div class="row justify-content-center col-sm-12"> 
                        <div class="container_comentar col-3" style="background-color: #66C4A9; margin-right: 72px;">
                            <form method="post" action="guardar_comentario.php" style="display: flexbox ">
                                <input type="text" name="nome" placeholder="nome" style="width: 22%">
                                <br>
                                <input type="text" name="email" placeholder="email" style="width: 22%">
                                <br>
                                <textarea id="comentario" name="comentario" rows="5" cols="33" placeholder="Digite seu comentario"></textarea>
                                <br>
                                <input id="submit" type="submit" value="Comentar" style=" width: 10%;">
                                <input type="hidden" name="id_animal" value="<?php echo $animal['id']?>">
                            </form>
                        </div>

                        <div class="container_coment col-5" style="background-color: #66C4A9;">
                                <?php
                                    foreach ($comentarios as $comentario){
                                    echo '<div class="row" style="background-color:;">';     
                                    echo $comentario['nome'];
                                    echo '<br>';
                                    echo $comentario['conteudo'];
                                    if ($comentario['resposta'] != null){
                                        echo "<br>";
                                        echo $instituicao['nome'];
                                        echo "<br>";
                                        echo $comentario['resposta'];
                                    }
                                    if (UsuarioEhinstituicaoDoAnimal()){
                                        ?>
                                        <form method="post" action="guardar_resposta.php?id=<?= $comentario['id']?>" style="display: flexbox ">
                                            <input type='text' name='resposta' placeholder='resposta' style='width: 22%'>
                                            <input id="" type='submit' value="Comentar">
                                            <input type="hidden" name="id_animal" value="<?php echo $animal['id']?>">
                                        </form>
                                    <?php
                                    }
                                    echo '</div>';
                                    
                                    }
                                ?>
                        </div>              
                    </div>
                </div><!-- FIMCONTIANER REALIZAR COMENTARIO + COMENTARIO -->    
                
            </div>
        </div>
    </body>
</html>

