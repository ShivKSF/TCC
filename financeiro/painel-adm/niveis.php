<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'niveis';

?>
<!--BOTAO-->
<div class="col-md-12 my-4">
    <a href="#" type="button" class="btn btn-dark">Novo Nível</a>
</div>
<!--TABELAS-->
<div class="tabela">
    <table id="example" class="table table-hover my-4">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Níveis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>02</td>
            </tr>
        </tbody>
    </table>
</div>
<!--SCRIPT DATATABLE-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "ordering": false
        });
    });
</script>