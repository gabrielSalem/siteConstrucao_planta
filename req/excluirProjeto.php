<?php
if(isset($_POST['destruir'])){
	$id_projeto = $_POST['id_projeto'];
	$del = deletar("projeto", " id_projeto = '{$id_projeto}'");

	$imgs = consultar("desenho", " id_projeto = '{$id_projeto}'");
	if ($imgs) {
		foreach ($imgs as $img) {
			unlink("imagem/".$img['arquivo']);
		}
	}
	$del2 = deletar("desenho", " id_projeto = '{$id_projeto}'");
	if($del && $del2){
		$_GET['msg'] = "3";
		unset($_POST['id_projeto']);
	}else{$_GET['msg'] = "1";}
}
?>