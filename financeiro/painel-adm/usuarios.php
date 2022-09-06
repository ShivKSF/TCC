<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'usuarios';
require_once($pagina . "/campos.php");

?>

<!--BOTAO-->
<div class="col-md-12 my-3">
    <a href="#" onclick="inserir()" type="button" class="btn btn-outline-warning">Cadastrar Usuários</a>
</div>

<!--TABELAS-->
<div class="tabela bg-light" id="listar">
    <!--TABELA SERA LISTADA AQUI DENTRO-->
</div>

<!-- MODAL PARA ABRIR UMA JANELA/TELA -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><?php echo $campo1 ?></label>
                        <input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><?php echo $campo2 ?></label>
                        <input type="email" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><?php echo $campo3 ?></label>
                        <input type="text" class="form-control" name="<?php echo $campo3 ?>" placeholder="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>" required>
                    </div>

                    <!--SELECT-->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nível</label>
                        <select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>">
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
                    </div>

                    <small>
                        <div id="mensagem" align="center"></div>
                    </small>

                    <input type="hidden" class="form-control" name="id" id="id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL EXCLUIR-->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-excluir" method="post">
                <div class="modal-body">
                    O registro <strong><span id="nome-excluido"></strong></span> será excluído, tem certeza que irá excluir?
                    <hr><small>
                        <div id="mensagem-excluir" align="center"></div>
                    </small>
                    <input type="hidden" class="form-control" name="id-excluir" id="id-excluir">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>