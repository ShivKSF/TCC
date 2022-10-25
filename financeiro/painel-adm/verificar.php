<?php 
@session_start();
if(@$_SESSION['perfil_usuario'] != 'Administrador' AND @$_SESSION['perfil_usuario'] != 'Auxiliar'){
		echo "<script>window.location='../index.php'</script>";
	}
 ?>
