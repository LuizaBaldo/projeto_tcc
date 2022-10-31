<?php
    $con = new mysqli("localhost", "root", "", "tcc");
    $resposta = $_POST["resposta"];
    $id = $_GET["id"];
    $id_animal = $_POST["id_animal"];
    $sql = "update comentario set resposta = ? where id = $id";
    $statement = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($statement, 's', $resposta);
    mysqli_stmt_execute($statement);
    header("location: pag_animal.php?id=$id_animal");
    mysqli_close($con);
