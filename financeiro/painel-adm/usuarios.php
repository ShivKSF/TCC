<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'usuarios';
require_once($pagina . "/campos.php");

?>


<div id="dashboard">

    <!--BOTAO "CADASTRAR USUÁRIO"-->
    <div class="botaoCadastro">
        <div class="col-md-12 my-3">
            <button onclick="botaoCadastro()" class="btn-cadastrar">Cadastrar Usuário</button>
        </div>

        <!--TABELAS-->
        <div class="tabela bg-light" id="listar">
            <!--TABELA SERA LISTADA AQUI DENTRO-->
        </div>
    </div>

    <!-- MODAL CADASTRAR USUARIOS -->
    <div class="form-cadastro">
        <div class="formu">
            <h1>Cadastrar Usuário</h1>
            <hr>
            <form id="form" method="post">
                <input type="text" placeholder="Nome" required></input>
                <input type="email" placeholder="example@example.com.br" required></input>
                <input type="password"placeholder="Insira sua senha" required></input>
                <!------- SELECIONE O NIVEL---------->
                <select name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>" placeholder="Selecione o nível">

                            <option value="" disabled selected>Selecione o nível</option>

                            <?php
                            $query = $pdo->query("SELECT * FROM niveis WHERE inativo = 0 ORDER BY nivel ASC");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            for ($i = 0; $i < @count($res); $i++) {
                                foreach ($res[$i] as $key => $value) {
                                }
                                $id_item = $res[$i]['id'];
                                $nivel_item = $res[$i]['nivel'];
                            ?>
                                <option value="<?php echo $nivel_item ?>"><?php echo $nivel_item ?></option>

                            <?php } ?>
                </select>
                    <!-- ---------------------------->
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