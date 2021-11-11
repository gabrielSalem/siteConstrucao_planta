<?php
include("protecao.php");
if(isset($_POST['criarProjeto'])){
	date_default_timezone_set('America/Sao_Paulo');
	$dados = array(
				 "id_usuario" => $_POST['id_usuario'],
				 "nome_projeto" => $_POST['titulo'],
				 "descricao_projeto" => $_POST['descricao'],
				 "data_criacao" => date("d/m/Y"),
				 "data_finalizacao" => "--/--/----",
				 "estado" => "N"
				);
	$id_usu = $_POST['id_usuario'];
	$name_proj = $_POST['titulo'];
	$nome = consultar("projeto", " id_usuario='{$id_usu}' AND nome_projeto='{$name_proj}'");
	if($nome){$_GET['msg'] = '5';}
	else{
		$criarProj = inserir("projeto", $dados, true);
		if($criarProj){
			$proj = consultar("projeto", " id_usuario='{$id_usu}'  ORDER BY id_projeto DESC limit 1");
			foreach ($proj as $projId) {
				$_POST['id_projeto'] = $projId['id_projeto'];
			}
			$_GET['msg'] = '4';
		}else{$_GET['msg'] = '1';}
	}
}
?>