<?php
require_once("../../conexao.php");
require_once("campos.php");

?>
<table id="example" class="table table-striped table-light table-hover my-4">
	<thead>
		<tr>
			<th><?php echo $campo1 ?></th>
			<th><?php echo $campo2 ?></th>

			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php


		$query = $pdo->query("SELECT * from $pagina WHERE excluido = 0 order by id desc ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		for ($i = 0; $i < @count($res); $i++) {
			foreach ($res[$i] as $key => $value) {
			}

			$id = $res[$i]['id'];
			$cp1 = $res[$i]['nome'];
			$cp2 = $res[$i]['cat_despesa'];

			$query2 = $pdo->query("SELECT * from cat_despesas where id = '$cp2'");
			$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
			$nome_cat = $res2[0]['nome'];

		?>
			<tr>
				<td><?php echo $cp1 ?></td>
				<td><?php echo $nome_cat ?></td>

				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>', '<?php echo $cp2 ?>')" title="Editar Registro">
							<i class="bi bi-pencil-fill"></i>
						</button>
						<button type="button" class="btn btn-danger" href="#" onclick="excluir('<?php echo $id ?>' , '<?php echo $cp1 ?>')" title="Excluir Registro">
							<i class="bi bi-trash"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php

?>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});

	});


	function editar(id, cp1, cp2) {
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(cp1);
		$('#<?= $campo2 ?>').val(cp2);


		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos() {
		$('#id').val('');
		$('#<?= $campo1 ?>').val('');

		$('#mensagem').text('');

	}
</script>