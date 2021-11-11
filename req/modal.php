<?php

	?>
	<div class="modal fade" id="novoProjeto" tabindex="-1" role="dialog" aria-labelledby="novoProjetoLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <form action="projeto.php" method="POST"><div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="novoProjetoLabel"><i class="fa fa-plus"></i> Criar projeto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
				<div class="modal-body form-group">
					<input type="text" name="titulo" class="form-control my-3" placeholder="Título projeto" required/>
					<textarea name="descricao" class="form-control my-3" placeholder="Descrição do projeto" style="height: 200px;" required></textarea>
					<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary" name="criarProjeto">Criar</button>
		      </div>
		    </div></form>
		  </div>
		</div>

		<div class="modal fade bd-modal-lg" id="projetos" tabindex="-1" role="dialog" aria-labelledby="projetosLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <form action="projeto.php" method="POST"><div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="projetosLabel"><i class="fa fa-folder"></i> Projetos</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
				<div class="modal-body form-group">
					<h3>Projetos - <small>Selecione para editar</small></h3>
					<table class="table">
						<thead style="background: rgb(141,159,198);">
							<tr>
								<th scope="col">Projeto</th>
								<th scope="col" class="text-center">Data de criação</th>
								<th scope="col" class="text-center">Data de finalização</th>
								<th scope="col" class="text-center"><i class="fa fa-check-circle-o"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$projetos = consultar("projeto"," id_usuario='$id_usuario'");
							if($projetos){
							foreach ($projetos as $projeto) { ?>
								<tr>
									<td scope="row" class="text-left">
										<label for="id_projeto<?php echo $projeto['id_projeto']?>">
											<?php echo $projeto['nome_projeto']; ?>
										</label>
									</td>
									<td scope="row" class="text-center">
										<label for="id_projeto<?php echo $projeto['id_projeto']?>">
											<?php echo $projeto['data_criacao'];?>
										</label>
									</td>
									<td class="text-center">
										<label for="id_projeto<?php echo $projeto['id_projeto']?>">
											<?php echo $projeto['data_finalizacao']; ?>
										</label>
									</td>
									<td class="text-center">
										<input type="radio" class="input-group" value="<?php echo $projeto['id_projeto']; ?>" id="id_projeto<?php echo $projeto['id_projeto'];?>" name="id_projeto" required>
									</td>
								</tr>
						<?php } }else{ ?>
								<tr>
							 		<td class="text-center" colspan="4	">
							 			<div class="alert alert-warning" role="alert">Nenhum projeto em questão ._.</div>
							 		</td>
							 	</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Alterar</button>
		      </div>
		    </div></form>
		  </div>
		</div>