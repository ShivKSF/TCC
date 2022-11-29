![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge)

# TCC
> Esse repositório foi criado com o intuito de armazenar o código de projeto de TCC.

# Ferramentas utilizadas

* PHP8 PDO
* MySQL
* Javascript
* AJAX
* jQuery
* Bootstrap
* DataTables
* ~Sass~ ()

## Passo a passo para utilizar o projeto

# **Instale uma IDE**

- [**VSCode**](https://code.visualstudio.com/assets/icons/download_blue.svg) (Recomendado)
- [**SUBLIME**](https://www.sublimetext.com/download_thanks?target=win-x64)

# **Instale o XAMPP**
- [**XAMPP**](https://www.apachefriends.org/pt_br/download.html)

# **Passo a passo**
- Copie a pasta financeiro e cole nesse caminho `C:\xampp\htdocs` .
- Execute o XAMPP e clique em Start no Apache e MySQL.
- Clique em admin no MySQL e crie o banco de dados.
1. Clique em Novo e em `"Nome da base de dados"` coloque o nome `financeiro`.
2. Ao lado haverá você precisará colocar `utf8_general_ci`.
3. Crie o banco de dados.
4. Crie a tabela com o nome `usuarios` e número de colunas `5`.
5. Criar banco de dados.
6. Importar o banco de dados que está dentro da pasta `banco`.
7. Vá em seu navegador e cole o seguinte caminho: `http://localhost/financeiro/`
8. Quando o sistema abrir, automaticamente será registrado no banco de dados um email e senha, por padrão foi inserido o seguinte:
Email: `kaique.sousa@unigranrio.br`
Senha: `1`

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
- [X] Cadastro de Níveis de Usuários
- [X] Cadastro de Usuários
- [X] Remove os Registros `Excluídos` da visualização, mas mantém no banco de dados
- [X] Cadastro de Pessoas
- [X] Alterar aparência
- [X] Criar Dashboard
- [X] Criar Contas: `à Pagar` e `à Receber`
- [X] Organizar arquivos
- [X] Opção para configurar permissões dos usuários
- [X] Criar Despesas
- [X] Criar frequência automática de contas
- [ ] Criar Casos de uso
- [X] Criar Diagrama de classe
- [ ] Não recarregar página de Login ao digitar dados incorretos
- [ ] Lembrete de data de aniversário, data de pagamentos, histórico de atleta, cursos, campeonatos, evolução, peso inicial, categoria

  - Diagrama de classe
   ```mermaid
   classDiagram
       class cat_despesas{
        -id
        -nome
        -excluido
        -usuario_deleta
       }
       class contas_pagar{
        -id
        -descricao
        -plano_conta
        -data_emissao
        -vencimento
        -frequencia
        -valor
        -usuario_lanc
        -usuario_baixa
        -status
        -data_recor
        -juros
        -multa
        -desconto
        -subtotal
        -data_baixa
        -arquivo
        -excluido
        -usuario_deleta
       }
        class contas_receber{
        -id
        -descricao
        -id_aluno
        -id_patrocinador
        -data_emissao
        -vencimento
        -frequencia
        -valor
        -usuario_lanc
        -usuario_baixa
        -status
        -data_recor
        -juros
        -multa
        -desconto
        -subtotal
        -data_baixa
        -arquivo
        -excluido
        -usuario_deleta
       }
        class despesas{
        -id
        -nome
        -cat_despesa
        -excluido
        -usuario_deleta
       }
        class frequencias{
        -id
        -nome
        -excluido
        -usuario_deleta
        -dias
       }
        class pessoas{
        -id
        -nome
        -nomeFantasia
        -cpf
        -cnpj
        -logradouro
        -bairro
        -cidade
        -uf
        -complemento
        -numero
        -cep
        -registroGeral
        -celularPessoal
        -celularComercial
        -emailPessoal
        -emailComercial
        -contato
        -observacao
        -dataNascimento
        -aluno
        -patrocinador
        -ativo
        -dataCadastro
       }
        class usuarios{
        -id
        -nome
        -email
        -senha
        -perfil
        -ativo
       }
        class valor_parcial{
        -id
        -id_conta
        -tipo
        -valor
        -data
        -usuario
       }
   ```


## Histórico de lançamentos

* 0.0.2
    * Pós Apresentação do TCC

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

