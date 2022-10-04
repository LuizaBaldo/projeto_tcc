<?php
    $con = new mysqli("localhost", "root", "", "tcc");
    $comentario = $_POST["comentario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $id_animal = $_POST["id_animal"];
    $sql = "insert into comentario (nome, email, conteudo, id_animal) values ( '$nome', '$email', '$comentario', '$id_animal')";
    $retorno = mysqli_query($con, $sql);

    header("location: pag_animal.php?id=$id_animal");