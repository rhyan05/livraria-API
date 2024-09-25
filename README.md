# API para uma livraria
Essa e uma API segue os padrões do CRUD(Create, read, update, delete) nas susas 5 tabelas, as tabelas são interligadas por um sistema logico que sera citado mais abaixo, então tome cuidado pois se não seguir a regra ele ira ocasionar em um erro. Este erro não ira estragar o seu projeto, ele so ira cinalisar que algo ali que você tentou executar não deu certo.

## Ordem para criar
- Editora
  - A tabela Editora é a primeira a ser criada porque ela é independente de outras tabelas. Ela não possui nenhuma chave estrangeira e é referenciada pela tabela Livro. Portanto, o primeiro passo na aplicação deve ser criar editoras para depois associá-las aos livros.
- Autor
  - A tabela Autor também é independente, como a Editora. Ela não depende de outras tabelas e é referenciada pela tabela Livro. Portanto, os autores devem ser criados antes de cadastrar livros que referenciem esses autores.
- Livro (requer IDs da Editora e Autor)
  - A tabela Livro é dependente tanto da tabela Editora quanto da tabela Autor. Ou seja, antes de criar um livro, você precisa ter editoras e autores já criados no banco de dados. Isso ocorre porque o Livro possui chaves estrangeiras que referenciam id_editora e id_autor.
- Estoque (requer ID do Livro)
  - A tabela Estoque depende de Livro, pois ela possui uma chave estrangeira id_livro que faz referência à tabela de livros. Portanto, antes de inserir um item de estoque, um livro correspondente deve existir no banco.
- Livraria (requer IDs do Estoque e Livro)
  - A tabela Livraria é a última a ser criada, pois ela depende tanto de Estoque quanto de Livro. Ela possui chaves estrangeiras id_estoque e id_livro, o que significa que tanto os livros quanto os estoques precisam existir para que uma livraria possa ser registrada.

# Pré-requisito
1. **Banco de Dados**: Crie o banco de dados usando o arquivo `db_crud.sql`. Esse arquivo contém o modelo do banco de dados necessário para a API funcionar.

2. **Ferramenta para Testar APIs**: Você pode usar ferramentas como [Insomnia](https://insomnia.rest/), [Postman](https://www.postman.com/), ou [Paw](https://paw.cloud/) para testar a API.

## Estrutura do Projeto
### `index.php`
Aqui sera feito a criação e o redirecionamento da API, ele ira identificar qual a função voce quer atravez do `fn`, por exemplo se você digitar `fn=read` ele ira identficar que você quer a função read, e depois ira ler o `type`, que ira redirecionar a pasta para realizar esta execução.
Esse redirecioanemtno de pasta ocorre atravez da função `type`, se estiver escrito `type=autor`, ele sabe que você quer realizar uma ação no arquivo autor.

Temos 4 `fn` diferentes, sendo eles
- `fn=create` -> que tem a função de criar um novo intem
- `fn=update` -> tem a função de atualizar um item que já criado
- `fn=read` -> ele ira mostrar todos os itens que ja foram criados
- `fn=delete` -> ele ira deleter um item

Tambem temos 5 `type` diferentes
- `type=editora` -> Ele acessa a pasta *Editora.php*
- `type=autor` -> Ele acessa a pasta *Autor.php*
- `type=livro` -> Ele acessa a pasta *Livro.php*
- `type=estoque` -> Ele acessa a pasta *Estoque.php*.
- `type=livraria` -> Ele acessa a pasta *Livraria.php*
  
### `tabelas/`
Aqui esta a execução da função da sua decisão do index, enquanto o index decide o que voce pede, o arquivo era ser executado.
Dentro dessa arquivos temos 5 arquivos: *Autor.php*, *Editora.php*, *Livraria.php*, *Livro.php*, *Estoque.php*.
Essas são os arquivos que o `type` ira acessar para realizar as ações.


# Aplicações 
Uma API trabalha com URLs, então segue abaixo um exemplo da aplicação
Obs: Atualize seu caminho, `http://localhost/Projetos/API/apis-php/API_crud_projeto/`, esse e o meu caminho, o seu pode sera diferente, então tome cuidado.
Para saber seu caminho e so ver aonde o arquivo foi guardado em seu computador.

### Criar uma Editora:
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=editora&name=Kilp&status=ativo

### Ler todas as Editoras:
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=read&type=editora

### Atualizar uma Editora:
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=update&type=editora&id=1&name=Kilp Atualizada&status=ativo

### Deletar uma Editora:
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=delete&type=editora&id=1

### Autor 1
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=autor&name=J.K. Rowling

### Autor 2
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=autor&name=George R.R. Martin


### Criar Editora
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=editora&name=Editora Fantástica&status=Ativo

### Criar Livros
#### Livro 1
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=livro&name=Harry Potter e a Pedra Filosofal&id_editora=1&id_autor=1&data_lancamento=1997-06-26&status=Disponível

#### Livro 2
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=livro&name=As Crônicas de Gelo e Fogo&id_editora=1&id_autor=2&data_lancamento=1996-08-06&status=Disponível

#### ler o livro especifico
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=read&type=livro&id=1

### Ler os livros 
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=read&type=livro

### Deletar livro 2
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=delete&type=livro&id=2

### Ler os livros 
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=read&type=livro

### Estoque
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=estoque&status=disponível&id_livro=1

### Criar Livraria
http://localhost/Projetos/API/apis-php/API_crud_projeto/api.php?fn=create&type=livraria&name=Livraria Mágica&id_estoque=1&id_livro=1
