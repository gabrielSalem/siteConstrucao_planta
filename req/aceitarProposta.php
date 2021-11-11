<?php
include("../config/config.php");
include("../config/crud.php");

$dados = array(
			 "id_proposta" => 0,
			 "id_usuario" => $_POST['id_detentor'],
			 "id_projeto" => $_POST['id_projeto'],
			 "id_profissional" => $_POST['id_profissional']
			);
$cadastrar = inserir("proposta", $dados, true);
$dados2 = array(
			 "estado" => 'P'
			);
$id = $_POST['id_projeto'];
$alterar = alterar("projeto", $dados2," id_projeto = '{$id}'");//P de pego
if($cadastrar && $alterar){
	header("location: ../trabalhos.php");
}else{header("location: ../propostas.php");}

?>