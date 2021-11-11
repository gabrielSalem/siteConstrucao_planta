<?php 
if(isset($_POST['cadIMG'])){
	$foto = $_FILES['foto'];
	if (!empty($foto["name"])) {
		$error = array();
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
     	   $_GET['msg'] = "1";
   	 	}  
		$dimensoes = getimagesize($foto["tmp_name"]);
   	 	$lar = 1200;
   	 	$largura = $dimensoes[0];
   	 	$altura = $dimensoes[1];
		// if($dimensoes[0] > $lar) { 
		// 	$error[4] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; 
		// 	$_GET['msg'] = "2";
		// }
		if (count($error) == 0) {
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	$caminho_imagem = "imagem/" . $nome_imagem;
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			$dados = array(
				"id_projeto" => $_POST['id_projeto'],
				"arquivo" => $nome_imagem,
				"largura" => $largura,
				"altura" => $altura,
				"nome_img" => null,
				"descricao_img" => null,
				"grafo" => null
			);
			$cad = inserir("desenho", $dados, true);
			if($cad){
				$_GET['msg'] = "4";
				unset($_POST['cadIMG']);
			}
		}else{
			$_GET['msg'] = "2";
		}
	}else{$_GET['msg'] = "1";}
}
?>