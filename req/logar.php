<?php
session_start();
include("../config/config.php");
include("../config/crud.php");

$email = $_POST['email_u'];
$senha = md5($_POST['senha_u']);
if($_POST){
	$login = consultar("usuario ", " email_usuario = '{$email}' AND senha_usuario = '{$senha}'");
	$link = consultar("usuario ", " email_usuario = '{$email}' AND senha_usuario = '{$senha}' AND tipo = '1'");
	if($login){
		foreach ($login as $c) {
			if($link){
				$_SESSION["ADMIN"] = $c;
				header("location: ../painel.php");
			}else{
				$_SESSION["USUARIO"] = $c;
				header("location: ../pagina.php");
			}
		}
	}else{header("location: ../index.php?msg=3");}
}else{header("location: ../index.php?msg=2");}
?>