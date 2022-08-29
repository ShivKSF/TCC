<?php
@session_start();
//VERIFICA SE USUARIO ADM ESTA CONECTADO, SE NAO ESTIVER ELE VOLTA PARA A TELA DE LOGIN
if(@$_SESSION['nivel_usuario'] != 'Administrador'){
    echo "<script>window.location='../index.php'</script>";
}
?>