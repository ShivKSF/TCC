<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'bancos';
require_once($pagina . "/campos.php");

?>

<div id="dashboard">

    <!--BOTAO "NOVO BANCO"-->
    <div class="botaoCadastro">
        <div class="col-md-12 my-3">
            <button onclick="botaoCadastro()" class="btn-cadastrar">Novo Banco</button>
        </div>

        <!--TABELAS-->
        <div class="tabela bg-light" id="listar">
            <!--TABELA SERA LISTADA AQUI DENTRO-->
        </div>
    </div>

    <!-- MODAL CADASTRAR PESSOAS -->
    <div class="form-cadastro">
        <div class="formu">
            <h1>Cadastrar Banco</h1>
            <hr>
            <form id="form" method="post">
                <input type="text" placeholder="Insira o nome do banco" required></input>
                
                <div class="buttons">
                    <button type="submit">Salvar</button>
                    <button type="button">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>