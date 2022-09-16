function botaoCadastro() {
    var menu = document.querySelector('#container');
    menu.classList.toggle('blur');
    var container = document.querySelector('.botaoCadastro');
    container.classList.toggle('blur');
    var popup = document.querySelector('.formu');
    popup.classList.toggle('active');
}