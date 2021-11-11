<?php
	include("../config/config.php");
	include("../config/crud.php");

	$id_projeto = $_POST['id_projeto'];
	$data_fim = $_POST['data_finalizacao'];
	$dados = array('estado' => "F","data_finalizacao" => $data_fim);

	$prop = consultar("proposta", " id_projeto = '{$id_projeto}'");
	$est = alterar("projeto", $dados," id_projeto = '{$id_projeto}'");
	
	if($prop && $est){
		unset($_POST['id_projeto']);
		header("location: ../trabalhos.php?msg=2");
	}else{
		header("location: ../trabalhos.php?msg=1");
	}

?>