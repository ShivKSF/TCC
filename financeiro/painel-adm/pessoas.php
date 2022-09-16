<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'pessoas';
require_once($pagina . "/campos.php");

?>


<div id="dashboard">

    <!--BOTAO "CADASTRAR PESSOA"-->
    <div class="botaoCadastro">
        <div class="col-md-12 my-3">
            <button onclick="botaoCadastro()" class="btn-cadastrar">Cadastrar Pessoas</button>
        </div>

        <!--TABELAS-->
        <div class="tabela bg-light" id="listar">
            <!--TABELA SERA LISTADA AQUI DENTRO-->
        </div>
    </div>

    <!-- MODAL CADASTRAR PESSOAS -->
    <div class="form-cadastro">
        <div class="formu">
            <h1>Cadastrar Pessoas</h1>
            <hr>
            <form>
                <input type="text" placeholder="Nome Completo" required></input>
                <input type="text" placeholder="example@example.com.br" required></input>
                <input type="password"placeholder="Insira sua senha" required></input>
                <div class="buttons">
                    <button type="submit">Salvar</button>
                    <button type="reset">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>