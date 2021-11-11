<?php 
session_start();
include("protecaoAd.php"); ?>
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
		<title>Projetos-store - Área administrativa</title>
	</head>
	<body>
		<?php include("config/config.php");include("config/crud.php");?>
		<ul class="nav navbar-collapse" style="background: rgb(41,59,98);"> 
			<li class="nav-item text-center">
				<a class="nav-link font-weight-bold text-white py-3" href="painel.php"><img src="imagem/icon.png" width="48px" class="custom-radio my-1rounded-right"><br><i class="fa fa-users"></i> (<?php echo $usuario;?>)</a>
			</li>
			<li class="nav-item">
				<a class="nav-link font-weight-bold text-white p-4" href="painel.php"><h5><i class="fa fa-home"></i> Projetos-store</h5></a>
			</li>
			<li class="nav-item float-right">
				<a class="nav-link text-light py-4" href="req/logout.php"><i class="fa fa-user"></i> Sair</a>
			</li>
		</ul>
		<div class="row m-2">
			<div class="col-lg-12 my-3"></div><!-- Espaço padrão -->
			<?php
				if(isset($_GET['msg']) && $_GET['msg'] == '1'){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Erro na tentativa de criar um novo admin :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
				if(isset($_GET['msg']) && $_GET['msg'] == '2'){?>
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Administrador cadastrado com sucesso :)
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
			?>
			<div class="col-lg-4 m-lg-auto p-3 rounded-right" style="background: rgba(255,255,255,.9);">
				<div class="row p-1">
					<h4 class="text-center col-lg-12 py-3">
						<a href="admin/projetos.php"  style="color: transparent;">
							<div class="text-center m-4" style="width: 130px;padding: 50px;border-radius: 7px;background: rgb(41,59,98);color: white;display: inline-block;cursor: pointer;">
								<i class="fa fa-folder"></i>
							</div>
						</a>
						<a href="admin/usuarios.php">
							<div class="text-center m-4" style="width: 130px;padding: 50px;border-radius: 7px;background: rgb(41,59,98);color: white;display: inline-block;cursor: pointer;">
								<i class="fa fa-users"></i><br/>
							</div>
						</a>
						<a href="#" data-toggle="modal" data-target="#novoAdmin" style="color: transparent;">
							<div class="text-center m-4" style="width: 130px;padding: 50px 35px;border-radius: 7px;background: rgb(41,59,98);color: white;display: inline-block;cursor: pointer;">
								<i class="fa fa-plus"><i class="fa fa-user mx-1"></i></i>
							</div>
						</a>
						<a href="admin/imagens.php">
							<div class="text-center m-4" style="width: 130px;padding: 50px;border-radius: 7px;background: rgb(41,59,98);color: white;display: inline-block;cursor: pointer;">
								<i class="fa fa-picture-o"></i><br/>
							</div>
						</a>
					</h4>
				</div>
			</div>
		</div>

		<!-- modal -->

		<div class="modal fade" id="novoAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <form action="req/cadastrarAdmin.php" method="POST"><div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Login de usuário</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
				<div class="modal-body form-group">
					<input type="text" name="nome_a" class="form-control my-3" placeholder="Nome" required/>
					<input type="email" name="email_a" class="form-control my-3" placeholder="Email" required/>
					<input type="password" name="senha_a" class="form-control my-3" placeholder="Senha" required/>
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Logar</button>
		      </div>
		    </div></form>
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