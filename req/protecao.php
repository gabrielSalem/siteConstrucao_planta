<?php
    if(!isset($_SESSION["USUARIO"])){
        header("location: index.php?msg=2");
    }else{
        $id_usuario = $_SESSION["USUARIO"]["id_usuario"];
        $usuario    = $_SESSION["USUARIO"]["nome_usuario"];
        $email      = $_SESSION["USUARIO"]["email_usuario"];
    }

