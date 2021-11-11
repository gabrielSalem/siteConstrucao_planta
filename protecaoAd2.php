<?php
	if(isset($_SESSION["ADMIN"])){
        $id_usuario = $_SESSION["ADMIN"]["id_usuario"];
        $usuario    = $_SESSION["ADMIN"]["nome_usuario"];
        $email      = $_SESSION["ADMIN"]["email_usuario"];
    }else{
        header("location: ../index.php?msg=2");
    }
?>
