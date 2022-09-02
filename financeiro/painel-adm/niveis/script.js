$(document).ready(function () {
    $('#example').DataTable({
        "ordering": false
    });
});


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
            //EXIBE MENSAGEM EM '#mensagem' E REMOVE CLASSE DE COR
            $('#mensagem').removeClass()
            //VERIFICA SE A MENSAGEM SALVO COM SUCESSO E RETORNADA
            if (mensagem.trim() == "Salvo com Sucesso!!!") {
                //FECHA AUTOMATICO A TELA COM O BOTAO DE FECHAR, EM CASO DE SUCESSO
                $('#btn-fechar').click();
                window.location = "index.php?+pag=" + pag;
            }
            //SE NAO, MOSTRA UM TEXTO VERMELHA
            else {
                $('#mensagem').addClass('text-danger')
            }
            //MOSTRA MENSAGEM
            $('#mensagem').text(mensagem)
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});