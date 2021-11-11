<?php 
	session_start();
	include("protecao.php"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/estilo2.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<meta name="author" content="Gabriel SA - gabrielbv177@gmail.com">
		<meta name="description" content="Site tal">
		<title>Projetos-store - Desenho</title>
		<style type="text/css">
			.form-inline button,input[type="color"]{
				padding: 3px 5px;
				margin: 10px 3px;
				background: transparent;
				border: none;
				font-family: arial;
				font-size: 0.9em;
				cursor: pointer;
			}
			#divForm input {
				width: 50px;
				padding: 2px 4px;
				margin: 10px 5px;
				border: solid 2px #d9d9d9;
				border-radius: 3px;
			}
			#elementos {
				width: 95%;
				border: 2px #e9e9e9 solid;
				border-bottom: 2px #d9d9d9 solid;
				border-radius: 5px;
				padding: 5px 10px;
				margin: 0 auto;
			}
			body {padding: 10px 0px;}
		</style>
	</head>
	<body>		
		<?php include("config/config.php");include("config/crud.php"); ?>
		<form action="projeto.php" method="POST">
			<input type="hidden" name="id_projeto" value="<?php echo $_POST['id_projeto'];?>">
			<button type="submit" class="btn btn-primary mx-4 my-2"><i class="fa fa-chevron-left"></i> Retornar ao projeto</button>
		</form>
  		<?php
			if(isset($_POST['id_projeto']) && !empty($_POST['id_projeto']) && isset($_POST['id_img']) && !empty($_POST['id_img'])){
			$id_projeto = $_POST['id_projeto'];
			$id_img = $_POST['id_img'];
			$desenhos = consultar("desenho d,projeto p"," d.id_projeto='$id_projeto' AND p.id_projeto='$id_projeto' AND p.id_usuario='{$id_usuario}' AND d.id_desenho = '{$id_img}'");
			if($desenhos){
				foreach ($desenhos as $desenho) { $url = $desenho['arquivo']; ?>
					<?php if(empty($desenho['grafo'])){?>
						<div class="form-inline m-4">
						    <button type="button" class="mx-2" id="btnUndo" disabled="disabled" title="Desfazer"><i class="fa fa-chevron-left"></i></button>
						    <button type="button" class="mx-2" id="btnRedo" disabled="disabled" title="Refazer"><i class="fa fa-chevron-right"></i></button>
						    <button type="button" class="mx-2" id="btnClear"><i class="fa fa-floppy-o" title="Salvar estado da imagem"></i></button>
						  	<span>
								<label for="cor" class="mx-2" style="margin-bottom: -15px;cursor: pointer;" title="Cor da reta"><i class="fa fa-tint"></i></label><input type="color" name="cor" id="cor" title="Cor do pincel"/>
							</span>
						</div>
						<h4 class="mx-4 my-2"><?php echo $desenho['nome_img'] ?></h4>
						<center>
							<?php 
								if($desenho['largura']<=1200){
									$largura = $desenho['largura'];
									$altura = $desenho['altura'];
								}elseif($desenho['largura']>1200 && $desenho['largura']<=1800){
									$largura = $desenho['largura']/1.5;
									$altura = $desenho['altura']/1.5;
								}elseif($desenho['largura']>1800 && $desenho['largura']<=2400){
									$largura = $desenho['largura']/2;
									$altura = $desenho['altura']/2;
								}elseif($desenho['largura']>2400 && $desenho['largura']<=3600){
									$largura = $desenho['largura']/2.5;
									$altura = $desenho['altura']/2.5;
								}elseif($desenho['largura']>3600 && $desenho['largura']<=4800){
									$largura = $desenho['largura']/3;
									$altura = $desenho['altura']/3;
								}elseif($desenho['largura']>4800 && $desenho['largura']<=7200){
									$largura = $desenho['largura']/3.5;
									$altura = $desenho['altura']/3.5;
								}elseif($desenho['largura']>7200 && $desenho['largura']<=9600){
									$largura = $desenho['largura']/4;
									$altura = $desenho['altura']/4;
								}
							?>
			        		<canvas id="view" width="<?php echo $largura;?>px" height="<?php echo $altura;?>px" style="background-image: url('imagem/<?php echo $url;?>');background-size: 100%;border: dashed 2px gray;border-radius: 7px;">Seu browser não suporta esta aplicação, atualize-o ou mude de software.</canvas>
			        	</center>
				    	<h4 class="mx-4 my-3 text-left">Medidas dos pontos: </h4>
					<?php }else{ ?>
						<h4 class="mx-4 my-2"><?php echo $desenho['nome_img'] ?></h4>
						<?php 
								if($desenho['largura']<=1200){
									$largura = $desenho['largura'];
									$altura = $desenho['altura'];
								}elseif($desenho['largura']>1200 && $desenho['largura']<=1800){
									$largura = $desenho['largura']/1.5;
									$altura = $desenho['altura']/1.5;
								}elseif($desenho['largura']>1800 && $desenho['largura']<=2400){
									$largura = $desenho['largura']/2;
									$altura = $desenho['altura']/2;
								}elseif($desenho['largura']>2400 && $desenho['largura']<=3600){
									$largura = $desenho['largura']/2.5;
									$altura = $desenho['altura']/2.5;
								}elseif($desenho['largura']>3600 && $desenho['largura']<=4800){
									$largura = $desenho['largura']/3;
									$altura = $desenho['altura']/3;
								}elseif($desenho['largura']>4800 && $desenho['largura']<=7200){
									$largura = $desenho['largura']/3.5;
									$altura = $desenho['altura']/3.5;
								}elseif($desenho['largura']>7200 && $desenho['largura']<=9600){
									$largura = $desenho['largura']/4;
									$altura = $desenho['altura']/4;
								}
							?>
						<center>
			        		<image src="<?php echo $desenho['grafo'];?>" width="<?php echo $largura; ?>px" height="<?php echo $altura;?>px" style="background-image: url('imagem/<?php echo $url;?>');background-size: 100%;">
			        		</image>				        		
			        	</center>
			        	<h4 class="mx-4 my-3 text-left">Medidas dos pontos: </h4>				    
			        	<div class="mx-5 text-left" style="margin-bottom: 30px;">
			        	<?php
			        		$coords = consultar("desenho_coordenadas"," id_projeto='$id_projeto' AND id_desenho='$id_img' GROUP BY letra");
							if($coords){
								foreach ($coords as $coord) {
									if(!empty($coord['valor'])){ ?>
										<div style="min-width: 50px;padding: 2px 5px;border: solid 2px #c9c9c9;border-radius: 7px;float: left;margin-right: 5px;margin-top: 5px;">
											<samp class="font-weight-bold"><?php echo $coord['letra'];?>:</samp><?php echo $coord['valor'];?>
										</div>
									<?php }
								}
							} 
			        	?>
			        	</div>
			        	<br/>
					<?php $dis = "d-none";$des = "disabled='disabled'";} ?>
				    <form action="projeto.php" method="POST" class="text-center">
						<div id="divForm" style="margin: 10px 20px;"></div>
				    	<h4 class="mx-4 my-3 text-left">Dados restantes: </h4>
						<input type="text" name="nome_proj" placeholder="Nome da imagem" id="elementos" class="mx-3" value="<?php echo $desenho['nome_img'] ?>" <?php echo $des = isset($des)? $des: null;?>>
						<textarea name="descricao_proj" id="elementos" class="mx-3 my-3 py-2" style="height: 120px;" placeholder="Descrição da imagem" <?php echo $des = isset($des)? $des: null;?>><?php echo $desenho['descricao_img'] ?></textarea>
						<input type="hidden" name="imagem" id="imagem">
						<input type="hidden" name="id_projeto" value="<?php echo $_POST['id_projeto']?>">
						<input type="hidden" name="id_img" value="<?php echo $_POST['id_img']?>">
						<input type="submit" value="Salvar alterações" onclick="to_image()" class="btn btn-success <?php echo $dis = isset($dis)? $dis: null;?>" id="imagem" name="editarImg" <?php echo $dis = isset($des)? $des: null;?>>
					</form>
    		<?php }
	        }else{header("location: projeto.php");}
	    }else{header("location: projeto.php");} ?>
		<script type="text/javascript">
			function to_image(){
                var canvas = document.getElementById("view");
                document.getElementById('imagem').value = canvas.toDataURL();
            }
	    </script>
		<script type="text/javascript" src="js/undomanager.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/circledrawer.js"></script>
	</body>
</html>
<!-- FAZER INTEIRACAO CLIENTE SERVIDOR -->