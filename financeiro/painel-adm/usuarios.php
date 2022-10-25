<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'usuarios';

require_once($pagina . "/campos.php");

?>

<div class="col-md-12 my-3">

	<div class="tabela bg-light" id="listar">

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo1 ?></label>
						<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo2 ?></label>
						<input type="email" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo3 ?></label>
						<input type="password" class="form-control" name="<?php echo $campo3 ?>" placeholder="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>" required>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo4 ?></label>
						<select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>">
							<option value="Administrador">Administrador</option>
							<option value="Auxiliar">Auxiliar</option>
						</select>
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


<script type="text/javascript">
	var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>