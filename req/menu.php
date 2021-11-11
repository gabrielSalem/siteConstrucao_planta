<ul class="nav navbar-collapse" style="background: rgb(41,59,98);"> 
	<li class="nav-item text-center">
		<a class="nav-link font-weight-bold text-white py-3" href="pagina.php" title="Usuário: <?php echo $usuario;?> - Email: <?php echo $email;?>"><img src="imagem/icon.png" width="48px" class="custom-radio"></a>
	</li>
	<li class="nav-item">
		<a class="nav-link font-weight-bold text-white p-4" href="pagina.php" title="Usuário: <?php echo $usuario;?> - Email: <?php echo $email;?>"><h5><i class="fa fa-home"></i> Projetos-store</h5></a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-light py-4 text-center" data-toggle="modal" data-target="#novoProjeto" style="cursor: pointer;"><i class="fa fa-plus"></i> Adicionar projeto</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-light py-4 text-center" data-toggle="modal" data-target="#projetos" style="cursor: pointer;"><i class="fa fa-folder-open-o"></i> Abrir projeto</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-light py-4" href="propostas.php"><i class="fa fa-envelope"></i> Propostas</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-light py-4" href="trabalhos.php"><i class="fa fa-suitcase"></i> Trabalhos</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-light py-4" href="req/logout.php" title="Usuário: <?php echo $usuario;?> - Email: <?php echo $email;?>"><i class="fa fa-user"></i> Sair</a>
	</li>
</ul>
