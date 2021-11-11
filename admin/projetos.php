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
		<title>Projetos-store - Projetos</title>
	</head>
	<body>
		<?php include("../req/menu2.php");include("../config/config.php");include("../config/crud.php"); ?>		
		<div class="my-4"></div><!-- Espaço padrão -->
		<h2 class="py-2">
			<a style="margin-left: 4%;" href="../painel.php" class="btn btn-primary">
				<i class="fa fa-chevron-left"></i>
			</a>
			<i class="fa fa-folder"></i> Projetos
		</h2>
		<div class="my-4"></div><!-- Espaço padrão -->
		<div class="row">
			<div class="col-lg-11 m-lg-auto">
				<form action="projetos.php" method="POST" class="row" style="font-family: arial;">
					<div class="col-5">
						<input type="text" name="palavra" placeholder="Palavra ..." class="form-control">
					</div>
					<div class="col-5">
						<select name="tipo" required class="form-control">
							<option value="">Tipo de informação</option>
							<option value="nome_projeto">Projeto</option>
							<option value="nome_usuario">Usuário</option>
							<option value="id_projeto">Número projeto</option>
							<option value="email_usuario">Email</option>
							<option value="email_usuario">Telefone</option>
						</select>
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-primary w-100" style="font-family: arial;"><i class="fa fa-search"> Buscar</i></button>
					</div>
				</form>
				<div class="my-4"></div><!-- Espaço padrão -->
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col" class="text-center align-middle">N° projeto</th>
							<th scope="col" class="w-25 align-middle">Projeto</th>
							<th scope="col" class="w-50 align-middle" >Usuario</th>
							<th scope="col" class="w-25 text-center align-middle">Data de criação</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($id_usuario)){
							if(!empty($_POST['palavra'])){
								$tipo = $_POST['tipo'];
								$palavra = $_POST['palavra'];
								$projetos = consultar("projeto p, usuario c"," c.id_usuario = p.id_usuario AND $tipo LIKE '%$palavra%'");
							}else{
								$projetos = consultar("projeto p, usuario c"," c.id_usuario = p.id_usuario ORDER BY nome_projeto");
							}
							if($projetos){
								foreach ($projetos as $projeto) { ?>
									<tr>
										<th class="text-center align-middle" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;">
											<h5><?php echo $projeto['id_projeto'];?></h5>
										</th>
										<td class="w-25 text-left align-middle" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											<?php echo $projeto['nome_projeto']; ?>
										</td>
										<td class="w-25 text-left align-middle" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											<samp>Nome: </samp><?php echo $projeto['nome_usuario']; ?><br/>
											<samp>Email: </samp><?php echo $projeto['email_usuario']; ?><br/>
											<samp>Telefone: </samp><?php echo $projeto['telefone']; ?>
										</td>
										<td class="w-25 text-center align-middle" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											<?php echo $projeto['data_criacao']; ?>
										</td>
									</tr>
						  		<?php } }else{?>
								 	<tr>
								 		<td class="text-center" colspan="4">
								 			<div class="alert alert-warning" role="alert">Nenhum projeto nos registros ._.</div>
								 		</td>
								 	</tr>							 	
							 <?php } }?> 
					</tbody>
				</table>
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