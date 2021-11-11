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
		<div class="my-3"></div><!-- Espaço padrão -->
		<h3>Propostas</h3>
		<div class="my-3"></div><!-- Espaço padrão -->
		<form action="propostas.php" method="POST" class="row" style="font-family: arial;">
			<div class="col-5">
				<input type="text" name="palavra" placeholder="Palavra, xx/xx/xxxx,..." class="form-control">
			</div>
			<div class="col-5">
				<select name="tipo" required class="form-control">
					<option value="">Tipo de informação</option>
					<option value="nome_projeto">Projeto</option>
					<option value="data_criacao">Data</option>
					<option value="descricao_projeto">Descrição</option>
				</select>
			</div>
			<div class="col-2">
				<button type="submit" class="btn btn-primary w-100" style="font-family: arial;"><i class="fa fa-search"> Buscar</i></button>
			</div>
		</form>
		<div class="my-3"></div><!-- Espaço padrão -->
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col" class="w-25 text-center">Projeto</th>
					<th scope="col" class="w-75">Detalhes</th>
					<th scope="col" class="text-center"><i class="fa fa-eye"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($id_usuario)){
					if(!empty($_POST['palavra'])){
						$tipo = $_POST['tipo'];
						$palavra = $_POST['palavra'];
						$desenhos = consultar("desenho d,projeto p"," p.id_projeto = d.id_projeto AND p.id_usuario <> '$id_usuario' AND estado = 'N' AND $tipo LIKE '%$palavra%' ORDER by p.data_criacao DESC");
					}else{
						$desenhos = consultar("desenho d,projeto p"," p.id_projeto = d.id_projeto AND p.id_usuario <> '$id_usuario' AND estado = 'N' ORDER by p.data_criacao DESC");
					}
					if($desenhos){
						foreach ($desenhos as $desenho) { 
							if(!empty($desenho['grafo'])){ ?>
							<tr>
								<th class="text-center w-25 align-middle" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;">
									<h5><?php echo $desenho['nome_projeto'];?></h5>
								</th>
								<td class="w-75 text-left align-middle" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
									<strong><?php echo $desenho['data_criacao'];?></strong><br/>
									<?php if(!empty($desenho['descricao_projeto'])){?><?php echo $desenho['descricao_projeto'];}?>	
								</td>
		 						<td class="text-center align-middle" style="vertical-align: middle;background: rgba(200,200,200,.2);border-left: solid 2px white;border-bottom: solid 2px white;">
									<form action="proporProjeto.php" method="POST"> 
										<input type="hidden" name="id_projeto" value="<?php echo $desenho['id_projeto'];?>">
										<button type="submit" class="btn btn-success" style="margin-bottom: 10px;" title="Analisar proposta">Analisar</button>
									</form>
								</td>
							</tr>
							<?php } }
					 }else{?>
					 	<tr>
					 		<td class="text-center" colspan="3">
					 			<div class="alert alert-warning" role="alert">Nenhuma proposta ._.</div>
					 		</td>
					 	</tr>
					<?php } 
					}else{ ?>
						<tr>
				 			<td class="text-center" colspan="3">
				 				<div class="alert alert-warning" role="alert">Nenhuma proposta com essa informação ._.</div>
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