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
				<div class="my-4"></div><!-- Espaço padrão -->
				<?php
				if(isset($_GET['msg']) && $_GET['msg'] == '1'){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Erro sucetíveis na tentativa de terminar projeto :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
				if(isset($_GET['msg']) && $_GET['msg'] == '2'){?>
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Projeto finalizado :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				} ?>
				<div class="my-3"></div><!-- Espaço padrão -->
				<h3>Trabalhos</h3>
				<div class="my-4"></div><!-- Espaço padrão -->

				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col" class="w-25 text-center">Projeto</th>
							<th scope="col" class="w-75">Cliente</th>
							<th scope="col" class="text-center"><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($id_usuario)){
							$trabalhos = consultar("projeto p, proposta pt,usuario u"," p.id_projeto =  pt.id_projeto AND pt.id_profissional = '{$id_usuario}' AND u.id_usuario = '{$id_usuario}' AND estado = 'P' ORDER BY p.data_criacao DESC");
							if($trabalhos){
								foreach ($trabalhos as $trabalho) { ?>
									<tr>
										<th class="align-middle text-left w-25" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;">
											Nome: <small><?php echo $trabalho['nome_projeto'] ?></small><br/>
											Descrição: <small><?php echo $trabalho['descricao_projeto'] ?></small><br/>
											Data: <small><?php echo $trabalho['data_criacao'] ?></small>
										</th>
										<td class="align-middle text-left" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											Nome: <?php echo $trabalho['nome_usuario'] ?><br/>
											Contato: <?php echo $trabalho['email_usuario'] ?><br/>
											<p style="margin-left: 62px;">
											<?php echo $trabalho['telefone'] ?></p>
										</td>
										<td class=" align-middle text-left" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											<button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#verTrabalho<?php echo $trabalho['id_projeto'] ?>" title="Excluir projeto"><i class="fa fa-eye"></i> </button>
											<button type="submit" class="btn btn-success m-1" data-toggle="modal" data-target="#finalizarTrabalho<?php echo $trabalho['id_projeto'] ?>" title="Finalizar projeto"><i class="fa fa-check"></i> </button>
										</td>
									</tr>

									<div id="verTrabalho<?php echo $trabalho['id_projeto'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="novoProjetoLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="novoProjetoLabel"><i class="fa fa-picture-o"></i> Imagens</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
													  <span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body form-group" style="width: 100%;margin-left: 5.5%;">
													<?php
													$id = $trabalho['id_projeto'];
													if(isset($id)){
														$desenhos = consultar("desenho"," id_projeto = '{$id}' ORDER BY id_desenho DESC");
														if($desenhos){
															foreach ($desenhos as $desenho) { 
																if(!empty($desenho['nome_img'])){ ?>

																	<?php if(!empty($desenho['nome_img'])){?><samp class="font-weight-bold">Nome: </samp>
																	<?php echo $desenho['nome_img'];}?><br/>
																	
																	<samp class="font-weight-bold">Largura:</samp><?php echo $desenho['largura'];?> px 
																	
																	<samp class="font-weight-bold ml-3">Altura:</samp><?php echo $desenho['altura'];?> px<br/>	
																	
																	<?php if(!empty($desenho['descricao_img'])){?><samp class="font-weight-bold">Descrição: 
																	</samp><?php echo $desenho['descricao_img'];}?><br/>
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
																	<img src="imagem/<?php echo $desenho['arquivo'];?>" class="img-thumbnail m-2" style="width: 85%;"><br/>
																	<?php
																	$url = $desenho['arquivo'];
																	if(!empty($desenho['grafo'])){?>
																		<image src="<?php echo $desenho['grafo'];?>" width="<?php echo $largura; ?>px" height="<?php echo $altura;?>px" class="img-thumbnail m-2" style="background-image: url('imagem/<?php echo $url;?>');background-size: 101%;width: 85%;"></image>
							        									</image>
							        								<?php } ?>
							        								<div style="margin-left: 10px;">						        										
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
																	<?php 		}
																			}
																		}?>
																	</div>
																<?php } ?>
															<hr class="jumbotron-hr" style="width:100%;margin: 0 auto;display: inline-block;">
															<?php }
														} ?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="finalizarTrabalho<?php echo $trabalho['id_projeto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title"><i class="fa fa-check"></i> Finalizar projeto</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body"><form action="req/finalizarTrabalho.php" method="POST">
													Finalizar projeto: <br/>
													<strong>Projeto</strong>: <?php echo $trabalho['nome_projeto'] ;?><br/>
													<strong>Data de criação: </strong>: <?php echo $trabalho['data_criacao'] ;?><br/>
													<strong>Cliente</strong>: <?php echo $trabalho['nome_usuario'] ;?><br/>
													<strong>Telefone: </strong>: <?php echo $trabalho['telefone'] ;?><br/>
													<strong>Email: </strong>: <?php echo $trabalho['email_usuario'] ;?><br/>
													<strong>Data de finalização: </strong>: <u><?php date_default_timezone_set('America/Sao_Paulo'); echo date("d/m/Y") ;?></u><br/>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_projeto" value="<?php echo $trabalho['id_projeto'] ?>">
													<input type="hidden" name="data_finalizacao" value="<?php echo date("d/m/Y") ?>">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													<button type="submit" class="btn btn-success">Finalizar trabalho</button>
												</div></form>
											</div>
										</div>
									</div>
								<?php } 
							} 
						}else{ ?>
						<tr>
				 			<td class="text-center" colspan="3">
				 				<div class="alert alert-warning" role="alert">Nenhum trabalho encontrado ._.</div>
				 			</td>
				 		</tr>
						<?php }
					}  ?>
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