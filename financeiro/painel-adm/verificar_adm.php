<?php 
@session_start();
if(@$_SESSION['perfil_usuario'] != 'Administrador'){ ?>

	<div class="row mt-4">

		<div class="col-md-6 col-sm-12">
			<div class="mb-3">
				
				<input type="text" class="form-control" name="usuario_admin"  id="usuario_admin" placeholder="Usuário Administrador" required>
			</div>
		</div>

		<div class="col-md-6 col-sm-12">
			<div class="mb-3">
				
				<input type="password" class="form-control" name="senha_admin"  id="senha_admin" placeholder="Senha Administrador" required>
			</div>
		</div>
	</div>

	<?php } ?>