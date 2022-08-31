# TCC

Esse repositório foi criado com o intuito de armazenar o código de projeto de TCC.

# Ferramentas utilizadas

* PHP8 PDO
* MySQL
* Javascript
* AJAX
* Bootstrap

## Passo a passo para utilizar o projeto

# **Instale uma IDE**

- [**VSCode**](https://code.visualstudio.com/assets/icons/download_blue.svg) (Recomendado)
- [**SUBLIME**](https://www.sublimetext.com/download_thanks?target=win-x64)

# **Instale o XAMPP**
- [**XAMPP**](https://downloadsapachefriends.global.ssl.fastly.net/8.1.6/xampp-windows-x64-8.1.6-0-VS16-installer.exe?from_af=true)

# **Passo a passo**
- Copie a pasta financeiro e cole nesse caminho `C:\xampp\htdocs` .
- Execute o XAMPP e clique em Start no Apache e MySQL.
- Clique em admin no MySQL e crie o banco de dados.
1. Clique em Novo e em `"Nome da base de dados"` coloque o nome `financeiro`.
2. Ao lado haverá você precisará colocar `utf8_general_ci`.
3. Crie o banco de dados.
4. Crie a tabela com o nome `usuarios` e número de colunas `5`.
5. Em estrutura você irá montar da seguinte forma:

| Nome  | Tipo    | Tamanho/Valores | Índice  | A_I |
|-------|---------|-----------------|---------|-----|
| id    | INT     |                 | PRIMARY | X   |
| nome  | VARCHAR | 50              |         |     |
| email | VARCHAR | 50              |         |     |
| senha | VARCHAR | 50              |         |     |
| nivel | VARCHAR | 50              |         |     |

* Obs.: Ao marcar a caixa de A_I (Auto Increment), o índice automaticamente é colocado como PRIMARY (Chave Primária).

7. Clique em `Guarda` para salvar as informações.
8. Vá em seu navegador e cole o seguinte caminho: `http://localhost/financeiro/`
9. Quando o sistema abrir, automaticamente será registrado no banco de dados um email e senha, por padrão foi inserido o seguinte:
Email: `kaique.sousa@unigranrio.br`
Senha: `123`
10. Seja Feliz! <3

# Lista de Desenvolvimento

- [X] Criar Banco de Dados para os Usuários
- [X] Criar tela de Login
- [X] Login
- [X] Logout
- [X] Mostrar nome do `Usuário` na barra de navegação
- [X] Criar validação de email duplicado
- [X] Alterar dados de Usuários
- [X] Impedir acesso sem login
- [X] Criar Menu
- [ ] Alterar aparência
- [ ] Criar Cadastros
- [ ] Criar Dashboard
- [ ] Criar Contas: `à Pagar` e `à Receber`
- [ ] Não recarregar página de Login ao digitar dados incorretos
- [ ] Organizar arquivos


## Histórico de lançamentos

* 0.0.1
    * Trabalho em andamento

### Autores
---

## Developer Back-End
<a href="https://www.linkedin.com/in/kaique-sousa-farias/">
 <img style="border-radius: 50%;" src="https://media-exp1.licdn.com/dms/image/C5603AQFdMc0dj1odkw/profile-displayphoto-shrink_200_200/0/1650305321449?e=1667433600&v=beta&t=zGGUhuC3aewW5-Z-BEr5msdP2mQ-lY_gdLnV-P_uD-I" width="100px;" alt=""/>
 <br />
 <sub><b>Kaique Sousa Farias</b></sub></a>

[![Linkedin Badge](https://img.shields.io/badge/-Kaique-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/kaique-sousa-farias/)](https://www.linkedin.com/in/kaique-sousa-farias/) 
[![Gmail Badge](https://img.shields.io/badge/-kaique.sousa@unigranrio.br-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:kaique.sousa@unigranrio.br)](mailto:kaique.sousa@unigranrio.br)

## Developer Front-End

<a href="https://www.linkedin.com/in/andreisgomes/">
 <img style="border-radius: 50%;" src="https://media-exp1.licdn.com/dms/image/C4E03AQHoRSMjSzU6OA/profile-displayphoto-shrink_800_800/0/1609195556804?e=1667433600&v=beta&t=DenfZdCxsLsO2MpUzGE35IJ60DQbQ11SyO_nwXygLo4" width="100px;" alt=""/>
 <br />
 <sub><b>Andrei de Souza Gomes</b></sub></a>

[![Linkedin Badge](https://img.shields.io/badge/-Andrei-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/andreisgomes/)](https://www.linkedin.com/in/andreisgomes/) 
[![Gmail Badge](https://img.shields.io/badge/-andrei.gomes@unigranrio.br-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:andrei.gomes@unigranrio.br)](mailto:andrei.gomes@unigranrio.br)

