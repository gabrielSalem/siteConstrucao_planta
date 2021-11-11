<?php
if(isset($_POST['exclusor'])){
	$id_desenho = $_POST['id_desenho'];
	$desenhos = consultar("desenho "," id_desenho='$id_desenho'");
	if($desenhos){
		$del = deletar("desenho", " id_desenho = '{$id_desenho}'");
		foreach ($desenhos as $desenho) {
			unlink("imagem/".$desenho['arquivo']);
		}
		if($del){
			$_GET['msg'] = "3";
		}else{$_GET['msg'] = "1";}
	}	
}
?>