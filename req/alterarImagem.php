<?php
if(isset($_POST['editarImg'])){
	$id_projeto = $_POST['id_projeto'];
	$id_img = $_POST['id_img'];

	$a = isset($_POST['lsRef1'])? $_POST['lsRef1'] : null;
	$b = isset($_POST['lsRef2'])? $_POST['lsRef2'] : null;
	$c = isset($_POST['lsRef3'])? $_POST['lsRef3'] : null;
	$d = isset($_POST['lsRef4'])? $_POST['lsRef4'] : null;
	$e = isset($_POST['lsRef5'])? $_POST['lsRef5'] : null;
	$f = isset($_POST['lsRef6'])? $_POST['lsRef6'] : null;
	$g = isset($_POST['lsRef7'])? $_POST['lsRef7'] : null;
	$h = isset($_POST['lsRef8'])? $_POST['lsRef8'] : null;
	$i = isset($_POST['lsRef9'])? $_POST['lsRef9'] : null;
	$j = isset($_POST['lsRef10'])? $_POST['lsRef10'] : null;
	$k = isset($_POST['lsRef11'])? $_POST['lsRef11'] : null;
	$l = isset($_POST['lsRef12'])? $_POST['lsRef12'] : null;
	$m = isset($_POST['lsRef13'])? $_POST['lsRef13'] : null;
	$n = isset($_POST['lsRef14'])? $_POST['lsRef14'] : null;
	$o = isset($_POST['lsRef15'])? $_POST['lsRef15'] : null;
	$p = isset($_POST['lsRef16'])? $_POST['lsRef16'] : null;
	$q = isset($_POST['lsRef17'])? $_POST['lsRef17'] : null;
	$r = isset($_POST['lsRef18'])? $_POST['lsRef18'] : null;
	$s = isset($_POST['lsRef19'])? $_POST['lsRef19'] : null;
	$t = isset($_POST['lsRef20'])? $_POST['lsRef20'] : null;
	$u = isset($_POST['lsRef21'])? $_POST['lsRef21'] : null;
	$v = isset($_POST['lsRef22'])? $_POST['lsRef22'] : null;
	$w = isset($_POST['lsRef23'])? $_POST['lsRef23'] : null;
	$x = isset($_POST['lsRef24'])? $_POST['lsRef24'] : null;
	$y = isset($_POST['lsRef25'])? $_POST['lsRef25'] : null;
	$z = isset($_POST['lsRef26'])? $_POST['lsRef26'] : null;

	$letra = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$coord = array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z);
	$dados = array(
			 "nome_img" => $_POST['nome_proj'],
			 "descricao_img" => $_POST['descricao_proj'],
			 "grafo" => $_POST['imagem']
			);
	$alterar = alterar("desenho", $dados," id_desenho = '{$id_img}'");	
	if ($alterar) {
		for ($i=0; $i < 26; $i++) { 
			if(!empty($letra[$i])){
				if(!empty($coord[$i])){
					$dados2 = array(
							"id_projeto" => $id_projeto,
							 "id_desenho" => $id_img,
							 "letra" => $letra[$i],
							 "valor" => $coord[$i]
					);
					$cad = inserir("desenho_coordenadas", $dados2);
				}
			}
		}
		if($cad){
			$_GET['msg'] = "4";
		}else{$_GET['msg'] = "1";}
	}else{$_GET['msg'] = "1";}
}
?>