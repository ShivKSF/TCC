<?php
require_once("../conexao.php");
require_once("verificar.php");
$tabela = 'pessoas';
$pagina = 'alunos';
require_once($pagina . "/campos.php");

?>

<div class="col-md-12 my-3">
	<div class="tabela bg-light" id="listar">
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="home" aria-selected="true">Dados Pessoais</a>
						</li>
					</ul>

					<hr>

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="home-tab">

							<div class="row">
								<div class="col-md-4 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo1 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Apelido</label>
										<input type="text" class="form-control" name="<?php echo $campo2 ?>" placeholder="Apelido" id="<?php echo $campo2 ?>">
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo3 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
										<input type="date" class="form-control" name="<?php echo $campo19 ?>" id="<?php echo $campo19 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo11 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo11 ?>" id="<?php echo $campo11 ?>" placeholder="<?php echo $campo11 ?>">
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo5 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo5 ?>" placeholder="<?php echo $campo5 ?>" id="<?php echo $campo5 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo6 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo6 ?>" placeholder="<?php echo $campo6 ?>" id="<?php echo $campo6 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo7 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo7 ?>" placeholder="<?php echo $campo7 ?>" id="<?php echo $campo7 ?>">
									</div>
								</div>

								<div class="col-md-1 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo8 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo8 ?>" placeholder="<?php echo $campo8 ?>" id="<?php echo $campo8 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo9 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo9 ?>" placeholder="<?php echo $campo9 ?>" id="<?php echo $campo9 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo10 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo10 ?>" placeholder="<?php echo $campo10 ?>" id="<?php echo $campo10 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Celular</label>
										<input type="text" class="form-control" name="<?php echo $campo13 ?>" placeholder="Telefone/Celular" id="<?php echo $campo13 ?>">
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Email</label>
										<input type="text" class="form-control" name="<?php echo $campo15 ?>" placeholder="Para cobrança automática" id="<?php echo $campo15 ?>">
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo17 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo17 ?>" placeholder="Para cobrança via WhatsApp" id="<?php echo $campo17 ?>">
									</div>
								</div>

								<div class="col-md-2 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo20 ?></label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo20 ?>" id="<?php echo $campo20 ?>">
											<option value="S" selected>Sim</option>
											<option value="N">Não</option>

										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Observações</label>
									<textarea maxlength="100" class="form-control" name="<?php echo $campo18 ?>" id="<?php echo $campo18 ?>"></textarea>
								</div>
							</div>

						</div>

					</div>



					<small>
						<div id="mensagem" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id" id="id">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<small>
						<div id="mensagem-excluir" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id-excluir" id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Aluno <span id="campo1"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<small>
					<span>
						<b>Apelido:</b>
						<span id="campo2"></span>
					</span>
					<span class="mx-4">
						<b><?php echo $campo3 ?></b>
						<span id="campo3"></span>
					</span>
					<hr style="margin:6px;">

					<span>
						<b><?php echo $campo5 ?>:</b>
						<span id="campo5"></span>
					</span>
					<span class="mx-4">
						<b><?php echo $campo10 ?>:</b>
						<span id="campo10"></span>
					</span>
					<hr style="margin:6px;">

					<span>
						<b><?php echo $campo6 ?>:</b>
						<span id="campo6"></span>
						<span class="mx-4">
							<b><?php echo $campo7 ?>:</b>
							<span id="campo7"></span>
						</span>
						<span class="mx-4">
							<b><?php echo $campo8 ?>:</b>
							<span id="campo8"></span>
							<hr style="margin:6px;">

							<span>
								<b><?php echo $campo9 ?>:</b>
								<span id="campo9"></span>
							</span>
							<hr style="margin:6px;">

							<span>
								<b><?php echo $campo18 ?>:</b><br>
								<span id="campo18"></span></span>
							<hr style="margin:6px;">
				</small>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>