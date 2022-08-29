<?php
//INICIA SESSAO
@session_start();
//ENCERRA SESSAO
@session_destroy();
//FAZ VOLTAR PARA O LOGIN INICIAL
echo "<script>window.location='index.php'</script>";

?>