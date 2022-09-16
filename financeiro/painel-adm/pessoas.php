<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'pessoas';
require_once($pagina . "/campos.php");

?>

<!--BOTAO-->
<div class="col-md-12 my-3">
    <a href="#" onclick="inserir()" type="button" class="btn btn-outline-warning">Cadastrar Pessoas</a>
</div>

<!--TABELAS-->
<div class="tabela bg-light" id="listar">
    <!--TABELA SERA LISTADA AQUI DENTRO-->
</div>

<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: white;
        background-color: #ffc107;
    }
    .nav-pills button{
    color:black;
    }
</style>
<!-- MODAL PARA ABRIR UMA JANELA/TELA -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">

                <!--MODAL TAB/NAV-->
                    <ul class="nav nav-pills yellow mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-dadosPessoais-tab" data-bs-toggle="pill" data-bs-target="#pills-dadosPessoais" type="button" role="tab" aria-controls="pills-dadosPessoais" aria-selected="true">Dados Pessoais</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dadosBancarios-tab" data-bs-toggle="pill" data-bs-target="#pills-dadosBancarios" type="button" role="tab" aria-controls="pills-dadosBancarios" aria-selected="false">Dados Bancarios</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dadosAtleta-tab" data-bs-toggle="pill" data-bs-target="#pills-dadosAtleta" type="button" role="tab" aria-controls="pills-dadosAtleta" aria-selected="false">Dados de Atleta</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dadosFornecedor-tab" data-bs-toggle="pill" data-bs-target="#pills-dadosFornecedor" type="button" role="tab" aria-controls="pills-dadosFornecedor" aria-selected="false">Dados de Fornecedor</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                        </li>

                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-dadosPessoais" role="tabpanel" aria-labelledby="pills-dadosPessoais-tab" tabindex="0">Dados Pessoais</div>

                        <div class="tab-pane fade" id="pills-dadosBancarios" role="tabpanel" aria-labelledby="pills-dadosBancarios-tab" tabindex="0">Dados Bancarios</div>

                        <div class="tab-pane fade" id="pills-dadosAtleta" role="tabpanel" aria-labelledby="pills-dadosAtleta-tab" tabindex="0">Dados de Atleta</div>

                        <div class="tab-pane fade" id="pills-dadosFornecedor" role="tabpanel" aria-labelledby="pills-dadosFornecedor-tab" tabindex="0">Dados de Fornecedor</div>

                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>

                    </div>
                    <!--FIM MODAL TAB/NAV-->

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