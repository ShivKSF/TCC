<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'niveis';

?>

<!--BOTAO-->
<div class="col-md-12 my-4">
    <a data-bs-toggle="modal" data-bs-target="#modalForm" type="button" class="btn btn-dark">Novo Nível</a>
</div>

<!--TABELAS-->
<div class="tabela bg-light">
    <table id="example" class="table table-striped table-hover my-4">
        <thead>
            <tr>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $pdo->query("SELECT * FROM niveis ORDER BY id ASC ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                for($i=0; $i < @count($res); $i++){
                    foreach ($res[$i] as $key => $value){}
            ?>
            <tr>
                <td><?php echo $res[$i]['nivel'] ?></td>
                <td>
                    <a href="#" title="Editar Registro"><i class="bi bi-pencil-square text-primary"></i></a>
                    <a href="#" title="Excluir Registro"><i class="bi bi-trash text-danger"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- MODAL PARA ABRIR UMA JANELA/TELA -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- BODY -->
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nível</label>
                        <input type="text" class="form-control" name="nivel" placeholder="Nível do Usuário" id="nivel">
                    </div>
                    <small><div id="mensagem" align="center"></div></small>
                    <input type="text" class="form-control" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="<?php echo $pagina ?>/script.js"></script>