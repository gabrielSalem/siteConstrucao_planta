<?php
include("../config/config.php");
include("../config/crud.php");

$dados = array(
			 "nome_usuario" => $_POST['nome_u'],
			 "email_usuario" => $_POST['email_u'],
			 "senha_usuario" => md5($_POST['senha_u']),
			 "telefone" => $_POST['telefone_u'],
			 "tipo" => 0
			);
$cadastrar = inserir("usuario", $dados, true);
if($cadastrar){
	foreach ($cadastrar as $cd){
		$_SESSION["USUARIO"] = $cd;
	}
	$id_usuario = $_SESSION["USUARIO"]["id_usuario"];
    $usuario    = $_SESSION["USUARIO"]["nome_usuario"];
    $email      = $_SESSION["USUARIO"]["email_usuario"];
	header("location: ../index.php?msg=4");
}else{header("location: ../index.php?msg=1");}

?>