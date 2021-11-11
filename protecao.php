<?php
	if(isset($_SESSION["USUARIO"])){
        $id_usuario = $_SESSION["USUARIO"]["id_usuario"];
        $usuario    = $_SESSION["USUARIO"]["nome_usuario"];
        $email      = $_SESSION["USUARIO"]["email_usuario"];
    }else{
        header("location: index.php?msg=2");
    }
?>
