<?php
	session_start();
	if(isset($_SESSION["USUARIO"])){
        header("location: pagina.php");
    }elseif (isset($_SESSION["USUARIO"])) {
        header("location: painel.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/estilo.css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<meta name="author" content="Gabriel SA - gabrielbv177@gmail.com">
		<meta name="description" content="Site tal">
		<title>Projeto-store</title>
	</head>
	<body>
		<div class="row">
			<?php
				if(isset($_GET['msg']) && $_GET['msg'] == '2'){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Erro sucetíveis na tentativa de acesso :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
				if(isset($_GET['msg']) && $_GET['msg'] == '3'){?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Login ou senha incorreto(s) :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
				if(isset($_GET['msg']) && $_GET['msg'] == '1'){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Erro sucetíveis no cadastro :/
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
				if(isset($_GET['msg']) && $_GET['msg'] == '4'){?>
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%;margin: 0 auto;">
			        	<strong># </strong> Cadastrado com sucesso :)
			        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
				<?php 
				}
			?>
			<!-- Linha 1 -->
			<div class="col-lg-12">
				<img src="imagem/logo.jpg" style="width: 100px;margin: 30px 50px;float: left;">
				<span>
					<span style="margin-top: 20px;margin-right: 45px;float: right;" class="ponto"></span>
					<h4 style="padding-top: 20px;margin-right: 10px;float: right;">Trabalho</h4>
				</span>
			</div>
			<!-- Linha 2 -->
			<div class="col-lg-12" style="margin-top: -85px;">
				<h1 class="text-center" style="font-size: 3.8em;font-family: tahoma;">PROJETOS-STORE</h1>
			</div>
			<!-- Linha 3 -->
			<div class="col-lg-12">
				<table class="centro">
					<tr class="trio">
						<td>
							<img src="imagem/IMG1.png"><br/>
						</td>
						<td>
							<button class="entre" data-toggle="modal" data-target="#login">ENTRAR</button>
						</td>
						<td>
							<img src="imagem/IMG2.png">
						</td>
					</tr>
					<tr>
						<td style="padding-top: 10px;">
							<button class="cadastre" data-toggle="modal" data-target="#cadastro">Cadastrar-se</button>
						</td>
						<td></td>
						<td class="social" colspan="1">
							<a href="#face"><i class="fa fa-facebook"></i></a>
							<a href="#insta"><i class="fa fa-instagram"></i></a>
							<a href="#twitter"><i class="fa fa-twitter"></i></a>
							<a href="#youtube"><i class="fa fa-youtube"></i></a>
						</td>
					</tr>
				</table>
			</div>
			<!-- Linha 4 -->
			<div class="col-lg-12">
				<span>
					<span style="margin-top: 10px;margin-left: 45px;float: left;" class="ponto"></span>
					<h4 style="padding-top: 10px;padding-left: 15px;margin-right: 10px;float: left;">Imagens</h4>
				</span>
				<span></span>
				<span>
					<span style="margin-top: 10px;margin-right: 45px;float: right;" class="ponto"></span>
					<h4 style="padding-top: 10px;margin-right: 10px;float: right;">Projetos</h4>
				</span>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <form action="req/cadastrar.php" method="POST"><div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Cadastro de usuário</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
				<div class="modal-body form-group">
					<input type="text" name="nome_u" class="form-control my-3" placeholder="Nome" required/>
					<input type="email" name="email_u" class="form-control my-3" placeholder="Email" required/>
					<input type="password" name="senha_u" class="form-control my-3" placeholder="Senha" required/>
					<input type="text" name="telefone_u" class="form-control my-3" placeholder="Telefone" maxlength="13" OnKeyPress="formatar('##-#####-####', this)" required/>
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Cadastrar</button>
		      </div>
		    </div></form>
		  </div>
		</div>
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <form action="req/logar.php" method="POST"><div class="modal-content">
		      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Login de usuário</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
				<div class="modal-body form-group">
					<input type="email" name="email_u" class="form-control my-3" placeholder="Email" required/>
					<input type="password" name="senha_u" class="form-control my-3" placeholder="Senha" required/>
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Logar</button>
		      </div>
		    </div></form>
		  </div>
		</div>
		<!-- Script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
        function formatar(mascara, documento){
          var i = documento.value.length;
          var saida = mascara.substring(0,1);
          var texto = mascara.substring(i)
          if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
          }
        }
    </script>
   	<script href="js/bootstrap.js"></script>
   	<script href="js/bootstrap.min.js"></script>
   	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>