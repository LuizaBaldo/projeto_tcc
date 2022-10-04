<?php
    session_start();
    function getUserLogged($id){
        $con = new mysqli("localhost", "root", "", "tcc");
        $retorno = mysqli_query($con, "select * from usuario where id='$id'");
        return mysqli_fetch_array($retorno);
    }
