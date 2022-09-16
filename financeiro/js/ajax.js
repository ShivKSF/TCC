$(document).ready(function() {
    listar();
} );
//EXCLUIR REGISTRO
function excluir(id, nome){
    $('#id-excluir').val(id);
    $('#nome-excluido').text(nome);
    var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), { });
    myModal.show();
    $('#mensagem-excluir').text('');
}
//INSERIR REGISTRO
function inserir(){
    $('#mensagem').text('');
    $('#tituloModal').text('Inserir Registro');
    var myModal = new bootstrap.Modal(document.getElementById('modalForm'), { });
    myModal.show();
    limparCampos();
}

//AJAX PARA INSERIR OU EDITAR DADOS
//NOME FORMULARIO PARA SUBMISSAO DE DADOS
$("#form").submit(function () {
    //NAO ATUALIZA PAGINA
    event.preventDefault(); 
    //RECEBE DADOS DO FORMULARIO
    var formData = new FormData(this);

    $.ajax({
        //COLETA ARQUIVO, EXECUTA
        url: pag + "/inserir.php",
        //PASSA O FORMULARIO NO METODO POST
        type: 'POST',
        //DADOS COLETADOS
        data: formData,

        // SE FUNCIONAR RETORNA MENSAGEM
        success: function (mensagem) {
            //LIMPA O TEXTO
            $('#mensagem').text('');
            //EXIBE MENSAGEM EM '#mensagem' E REMOVE CLASSE DE COR
            $('#mensagem').removeClass()
            //VERIFICA SE A MENSAGEM SALVO COM SUCESSO E RETORNADA
            if (mensagem.trim() == "Salvo com Sucesso") {
                //FECHA AUTOMATICO A TELA COM O BOTAO DE FECHAR, EM CASO DE SUCESSO
                $('#btn-fechar').click();
                listar();
            }
            //SE NAO, MOSTRA UM TEXTO VERMELHA
            else {
                $('#mensagem').addClass('text-danger')
                //MOSTRA MENSAGEM
                $('#mensagem').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});


function listar() {
    $.ajax({
        url: pag + "/listar.php",
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",

        success: function (result) {
            $("#listar").html(result);
        }
    });
}

$("#form-excluir").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        //COLETA ARQUIVO, EXECUTA
        url: pag + "/excluir.php",
        //PASSA O FORMULARIO NO METODO POST
        type: 'POST',
        //DADOS COLETADOS
        data: formData,

        // SE FUNCIONAR RETORNA MENSAGEM
        success: function (mensagem) {
            //LIMPA O TEXTO
            $('#mensagem-excluir').text('');
            //EXIBE MENSAGEM EM '#mensagem' E REMOVE CLASSE DE COR
            $('#mensagem-excluir').removeClass()
            //VERIFICA SE A MENSAGEM EXCLUIDO COM SUCESSO E RETORNADA
            if (mensagem.trim() == "Excluído com Sucesso") {
                    $('#btn-fechar-excluir').click();
                    listar();
                }
                //SE NAO, MOSTRA UM TEXTO VERMELHA
                else {
                    $('#mensagem-excluir').addClass('text-danger')
                    //MOSTRA MENSAGEM
                    $('#mensagem-excluir').text(mensagem)
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        });
});




