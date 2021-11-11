<?php 	
session_start();
include("protecao.php"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/estilo2.css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<meta name="author" content="Gabriel SA - gabrielbv177@gmail.com">
		<meta name="description" content="Site tal">
		<title>Projetos-store - Área do usuário</title>
	</head>
	<body>
		<?php include("req/menu.php");include("config/config.php");include("config/crud.php"); ?>
		<div class="row">
		<div class="col-11" style="margin: 0 auto;">
		<h3 style="margin-top: 20px;"> 
			<?php
			if(isset($_POST['id_projeto']) && !empty($_POST['id_projeto'])){
				$id_projeto = $_POST['id_projeto'];	$projetos = consultar("projeto"," id_projeto='$id_projeto'"); 
				if($projetos){
					foreach ($projetos as $projeto) {
						echo "Projeto: ".$projeto['nome_projeto'];
						$id_detentor = $projeto['id_usuario'];
					}
				}
			}?>
		</h3>
		<div class="my-4"></div><!-- Espaço padrão -->
		<form action="propostas.php" method="POST" class="float-left">
			<input type="hidden" name="id_projeto" value="<?php echo $_POST['id_projeto'];?>">
			<button type="submit" class="btn btn-primary" style="margin-top: 0px;margin-bottom: 20px;"><i class="fa fa-chevron-left"></i> Retornar as propostas</button>
		</form>
		<form action="req/aceitarProposta.php" method="POST" class="float-right">
			<input type="hidden" name="id_projeto" value="<?php echo $_POST['id_projeto'];?>">
			<input type="hidden" name="id_profissional" value="<?php echo $id_usuario;?>">
			<input type="hidden" name="id_detentor" value="<?php echo $id_detentor;?>">
			<button type="submit" class="btn btn-success" style="margin-top: 0px;margin-bottom: 20px;">Aceitar proposta</button>
		</form>
		<div class="my-4"></div><!-- Espaço padrão -->
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col" class="w-25 text-center">Imagem</th>
					<th scope="col" class="w-75">Detalhes</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($_POST['id_projeto']) && !empty($_POST['id_projeto'])){
					$id_projeto = $_POST['id_projeto'];
					$desenhos = consultar("desenho d,projeto p "," d.id_projeto='$id_projeto' AND p.id_projeto='$id_projeto'");
					if($desenhos){
						foreach ($desenhos as $desenho) { 
							if(!empty($desenho['nome_img'])){ ?>
							<tr>
								<th class="text-center w-25" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;">
									<a href="#" data-toggle="modal" data-target="#verImg<?php echo $desenho['id_desenho']; ?>">
										<img src="imagem/<?php echo $desenho['arquivo'];?>" class="img-thumbnail" width="<?php echo $desenho['largura'];?>" height="<?php echo $desenho['altura'];?>">	
									</a>
								</th>
								<td class="w-75 text-left align-middle" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
									<?php if(!empty($desenho['nome_img'])){?><samp class="font-weight-bold">Nome: </samp><?php echo $desenho['nome_img'];}?><br/>
									<samp class="font-weight-bold">Largura: </samp><?php echo $desenho['largura'];?> px<br/>
									<samp class="font-weight-bold">Altura: </samp><?php echo $desenho['altura'];?> px<br/>											
									<?php if(!empty($desenho['descricao_img'])){?><samp class="font-weight-bold">Descrição: </samp><?php echo $desenho['descricao_img'];}?><br/>
									<?php
										$iImg = $desenho['id_desenho']; 
										$id_p = $desenho['id_projeto']; 
											$retas = consultar("desenho_coordenadas c, projeto p"," c.id_projeto = '$id_p' AND p.id_projeto = '$id_p' AND c.id_desenho = '$iImg' GROUP BY letra");
										if($retas){
											foreach ($retas as $reta) { 
												if(!empty($reta['valor'])){?>
													<div style="min-width: 50px;padding: 2px 5px;border: solid 2px #c9c9c9;border-radius: 7px;float: left;margin-right: 5px;margin-top: 5px;">
														<samp class="font-weight-bold"><?php echo $reta['letra'];?>:</samp><?php echo $reta['valor'];?>
													</div>
											<?php } 
											}
										}
									?>
								</td>
							</tr>

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
											<img src="imagem/<?php echo $desenho['arquivo'];?>" class="img-thumbnail m-2" style="width: 85%;"><br/>
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
											}?>
											<?php
											$url = $desenho['arquivo'];
											if(!empty($desenho['grafo'])){?>
												<image src="<?php echo $desenho['grafo'];?>" width="<?php echo $largura; ?>px" height="<?php echo $altura;?>px" class="img-thumbnail m-2" style="background-image: url('imagem/<?php echo $url;?>');background-size: 101%;width: 85%;">
	        									</image>
	        								<?php } ?>	
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
										</div>
									</div></form>
								</div>
							</div>
						<?php $od_proj = $desenho['id_projeto']; } }
					 }else{?>
					 	<tr>
					 		<td class="text-center" colspan="2">
					 			<div class="alert alert-warning" role="alert">Nenhuma projeto ._.</div>
					 		</td>
					 	</tr>							 	
					 <?php } }else{?>
					 	<tr>
					 		<td class="text-center" colspan="2">
					 			<button class="btn btn-primary" data-toggle="modal" data-target="#projetos" style="cursor: pointer;" checked="checked"><i class="fa fa-folder-open-o"></i> Abrir projeto</button>
					 		</td>
					 	</tr>
					 <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include("req/modal.php");?>
        <script src="js/bootstrap.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>