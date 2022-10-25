<?php 
@session_start();
if(@$_SESSION['perfil_usuario'] != 'Administrador'){
		echo "<script>window.location='../index.php'</script>";
	}
 ?>
