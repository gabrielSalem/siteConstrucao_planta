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
		<div class="row m-2">
			<?php
				if(isset($_GET['msg']) && $_GET['msg'] == '1'){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Erro na tentativa de criar um novo projeto :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
			?>
			<div class="col-lg-12 my-3"></div><!-- Espaço padrão -->
			<div class="col-lg-10 m-lg-auto p-3 rounded-right" style="background: rgba(141,159,198,.2);">
				<h4>Apresentação</h4>
				<p class="text-justify">Bem vindo a plataforma de desenvolvimento arquirtetônico, com estruturas detalhadas pelas suas medidas e ...</p>
			</div>
			<div class="col-lg-12 my-3"></div><!-- Espaço padrão -->
			<div class="col-lg-10 m-lg-auto p-3 rounded-right row" style="background: rgba(141,159,198,.2);">
				<h4 class="text-left col-lg-12 py-3">Como funciona?</h4>
				<div class="col-lg-6">
					<p class="text-justify">As açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjunto.As açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs as serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjunto</p>
					<p class="text-justify">As açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjunto.As açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico, no qual fará o tutorial inicial do conjuntoAs açõpes a seres feitas serão demonstradas de forma deida nesse tópico.</p>
				</div>
				<div class="col-lg-6" class="imgExemplo">
					<img src="imagem/IMG1.png" class="img-thumbnail">
					<img src="imagem/IMG2.png" class="img-thumbnail">
					<img src="imagem/logo.jpg" class="img-thumbnail">
					<img src="imagem/icon.png" class="img-thumbnail">
				</div>
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