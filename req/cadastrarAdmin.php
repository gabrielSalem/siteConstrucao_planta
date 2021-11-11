<?php

include("../config/config.php");
include("../config/crud.php");

$dados = array(
			 "nome_usuario" => $_POST['nome_a'],
			 "email_usuario" => $_POST['email_a'],
			 "senha_usuario" => md5($_POST['senha_a']), 
	 		 "telefone" => "",
	 		 "tipo" => "1"
			);
$cadastrar = inserir("usuario", $dados, true);
if($cadastrar){
	header("location: ../painel.php?msg=2");
}else{header("location: ../painel.php?msg=1");}

?>