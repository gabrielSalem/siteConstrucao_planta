<?php session_start();include("../protecaoAd2.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/estilo2.css">
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<meta name="author" content="Gabriel SA - gabrielbv177@gmail.com">
		<meta name="description" content="Site tal">
		<title>Projetos-store - Desenhos</title>
	</head>
	<body>
		<?php include("../req/menu2.php");include("../config/config.php");include("../config/crud.php"); ?>
		<div class="my-4"></div><!-- Espaço padrão -->
		<h2 class="py-2">
			<a style="margin-left: 4%;" href="../painel.php" class="btn btn-primary">
				<i class="fa fa-chevron-left"></i>
			</a>
			<i class="fa fa-picture-o"></i> Imagens
		</h2>		
		<div class="row">
			<div class="col-lg-11 m-lg-auto">
				<form action="imagens.php" method="POST" class="row" style="font-family: arial;">
					<div class="col-5">
						<input type="text" name="palavra" placeholder="Palavra ..." class="form-control">
					</div>
					<div class="col-5">
						<select name="tipo" required class="form-control">
							<option value="">Tipo de informação</option>
							<option value="nome_usuario">Usuário</option>
							<option value="nome_img">Nome imagem</option>
						</select>
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-primary w-100" style="font-family: arial;"><i class="fa fa-search"> Buscar</i></button>
					</div>
				</form>
				<div class="my-4"></div><!-- Espaço padrão -->
				<hr class="jumbotron-hr">
				<div class="my-4"></div><!-- Espaço padrão -->
			</div>
		</div>
		<div class="row text-center"> 
			<?php
			if(isset($id_usuario)){
				if(!empty($_POST['palavra'])){
					$tipo = $_POST['tipo'];
					$palavra = $_POST['palavra'];
					$desenhos = consultar("desenho d,projeto p,usuario u"," u.id_usuario = p.id_usuario AND d.id_projeto=p.id_projeto AND $tipo LIKE '%$palavra%'");
				}else{
					$desenhos = consultar("desenho d,projeto p,usuario u "," u.id_usuario = p.id_usuario AND d.id_projeto=p.id_projeto ORDER BY d.id_desenho DESC");
				}
				if($desenhos){
					foreach ($desenhos as $desenho) { ?>
						<div class="col-lg-3 align-middle m-auto">
							<a href="#" data-toggle="modal" data-target="#verImg<?php echo $desenho['id_desenho']; ?>">
								<img src="../imagem/<?php echo $desenho['arquivo'];?>" class="img-thumbnail" width="<?php echo $desenho['largura'];?>" height="<?php echo $desenho['altura'];?>" style="width: 85%;">	
							</a>
							<br/>
							<small class="font-weight-bold">Usuario: </small><?php echo $desenho['nome_usuario'];?><br/>
							<small class="font-weight-bold">Nome da imagem: </small><?php if(!empty($desenho['nome_img'])){echo $desenho['nome_img'];}else{echo "----";} ?>
						</div>
						<div class="modal fade" id="verImg<?php echo $desenho['id_desenho']; ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<form action="projeto.php" method="POST"><div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="TituloModalCentralizado"><i class="fa fa-picture-o"></i> Ver imagem</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body text-center">
										<img src="../imagem/<?php echo $desenho['arquivo'];?>" class="img-thumbnail m-2" width="90%"><br/>
										<?php 
										if($desenho['largura']<=1200){
											$largura = $desenho['largura']/2;
											$altura = $desenho['altura']/2;
										}elseif($desenho['largura']>1200 && $desenho['largura']<=1800){
											$largura = $desenho['largura']/3;
											$altura = $desenho['altura']/3;
										}elseif($desenho['largura']>1800 && $desenho['largura']<=2400){
											$largura = $desenho['largura']/4;
											$altura = $desenho['altura']/4;
										}elseif($desenho['largura']>2400 && $desenho['largura']<=3600){
											$largura = $desenho['largura']/4.5;
											$altura = $desenho['altura']/4.5;
										}elseif($desenho['largura']>3600 && $desenho['largura']<=4800){
											$largura = $desenho['largura']/5;
											$altura = $desenho['altura']/5;
										}elseif($desenho['largura']>4800 && $desenho['largura']<=7200){
											$largura = $desenho['largura']/5.5;
											$altura = $desenho['altura']/5.5;
										}elseif($desenho['largura']>7200 && $desenho['largura']<=9600){
											$largura = $desenho['largura']/6;
											$altura = $desenho['altura']/6;
										}
										$url = $desenho['arquivo'];
										if(!empty($desenho['grafo'])){?>
											<image src="<?php echo $desenho['grafo'];?>" width="<?php echo $largura; ?>px" height="<?php echo $altura;?>px" class="thead-default" style="background-image: url('../imagem/<?php echo $url;?>');background-size: 100%;" width: 90%;>
        									</image>
										<?php }?>	
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									</div>
								</div></form>
							</div>
						</div>
					<?php 
				  } }else{?>
			 			<div class="alert alert-warning" role="alert">Nenhuma imagem armazenada ._.</div>
				 <?php }}
				  ?>
			</div>
		</div>
		<?php include("../req/modal.php");?>
        <script src="../js/bootstrap.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>