<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'home';

?>

<!--------  PaINEL PRINCIPAL ----------->
<div id="dashboard">
            <div class="painel">
                <div class="atalhoRapido">
                    <h2>Atalhos Rápidos</h2>
                    <div class="card">
                        <div class="cardOne">
                            <a href="index.php?pag=<?php echo $menu2 ?>">
                                <span class="material-symbols-outlined">&#Xea1d;</span>
                                <span>Pessoas</span>
                            </a>
                        </div>
                        <div class="cardTwo">
                            <a href="index.php?pag=<?php echo $menu5 ?>">
                                <span class="material-symbols-outlined">&#Xe84f;</span>
                                <span>Bancos</span>
                            </a>
                        </div>
                        <div class="cardThree">
                            <a href="index.php?pag=<?php echo $menu3 ?>">
                                <span class="material-symbols-outlined">&#Xe7fd;</span>
                                <span>Usuários</span>
                            </a>
                        </div>
                    </div>
                </div>
                


            </div>
        </div>