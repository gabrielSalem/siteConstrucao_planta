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
		<title>Projetos-store - Usuários</title>
	</head>
	<body>
		<?php include("../req/menu2.php");include("../config/config.php");include("../config/crud.php"); ?>
		<div class="my-4"></div><!-- Espaço padrão -->
		<h2 class="py-2">
			<a style="margin-left: 4%;" href="../painel.php" class="btn btn-primary">
				<i class="fa fa-chevron-left"></i>
			</a>			
			<i class="fa fa-users"></i> Usuarios
		</h2>
		<div class="my-4"></div><!-- Espaço padrão -->	
		<div class="row">
			<div class="col-lg-11 m-lg-auto">
				<form action="usuarios.php" method="POST" class="row" style="font-family: arial;">
					<div class="col-5">
						<input type="text" name="palavra" placeholder="Palavra ..." class="form-control">
					</div>
					<div class="col-5">
						<select name="tipo" required class="form-control">
							<option value="">Tipo de informação</option>
							<option value="nome_usuario">Usuário</option>
							<option value="email_usuario">Email</option>
							<option value="email_usuario">Telefone</option>
							<option value="email_usuario">Administradores</option>
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
							<th scope="col" class="w-25">Nome</th>
							<th scope="col" class="w-25">Email</th>
							<th scope="col" class="w-25 text-center">Telefone</th>
							<th scope="col" class="text-center">Usuario</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($id_usuario)){
							if(!empty($_POST['palavra'])){
								$tipo = $_POST['tipo'];
								$palavra = $_POST['palavra'];
								$usuarios = consultar("usuario "," $tipo LIKE '%$palavra%'");
							}else{
								$usuarios = consultar("usuario"," id_usuario >= 0 ORDER BY nome_usuario");
							}
							if($usuarios){
								foreach ($usuarios as $usuario) { ?>
									<tr>
										<th class="text-left w-25" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;">
											<h5><?php echo $usuario['nome_usuario'];?></h5>
										</th>
										<td class="w-25 text-left" style="background: rgba(200,200,200,.2);border-left: solid 1px white;border-bottom: solid 2px white;">
											<?php echo $usuario['email_usuario'];?> 				
										</td>
				 						<td class="text-center w-50" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;border-left: solid 1px white;">
											<?php echo $usuario['telefone'];?> 				
										</td>
										<td class="text-center" style="vertical-align: middle;background: rgba(200,200,200,.2);border-bottom: solid 2px white;border-left: solid 1px white;">
											<?php
												if($usuario['tipo']==0){
													echo "<i class='fa fa-user'> COMUM</i> ";
												}else{
													echo "<i class='fa fa-users'> ADMIN</i>";
												}
											?> 				
										</td>
									</tr>
									
								<?php 
							 } } else{?>
							 	<tr>
							 		<td class="text-center" colspan="4">
							 			<div class="alert alert-warning" role="alert">Nenhum usuario cadastrado ._.</div>
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