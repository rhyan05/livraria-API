1. Exemplos para Editora
Criar uma Editora

GET /api.php?fn=createEditora&nome_editora=Editora%20X&status_editora=Ativo

Ler todas as Editoras
GET /api.php?fn=getAllEditoras

Ler uma Editora por ID
GET /api.php?fn=getEditoraById&id=1

Atualizar uma Editora
GET /api.php?fn=updateEditora&id=1&nome_editora=Editora%20Y&status_editora=Inativo

Excluir uma Editora
GET /api.php?fn=deleteEditora&id=1

2. Exemplos para Autor

Criar um Autor
GET /api.php?fn=createAutor&nome_autor=Autor%20X

Ler todos os Autores
GET /api.php?fn=getAllAutores

Ler um Autor por ID
GET /api.php?fn=getAutorById&id=1

Atualizar um Autor
GET /api.php?fn=updateAutor&id=1&nome_autor=Autor%20Y

Excluir um Autor
GET /api.php?fn=deleteAutor&id=1

3. Exemplos para Livro
Criar um Livro
GET /api.php?fn=createLivro&nome_livro=Livro%20X&id_editora=1&id_autor=1&data_lancamento=2024-01-01&status_matricula=Disponível

Ler todos os Livros
GET /api.php?fn=getAllLivros

Ler um Livro por ID
GET /api.php?fn=getLivroById&id=1

Atualizar um Livro
GET /api.php?fn=updateLivro&id=1&nome_livro=Livro%20Y&id_editora=1&id_autor=1&data_lancamento=2024-01-15&status_matricula=Indisponível

Excluir um Livro
GET /api.php?fn=deleteLivro&id=1

4. Exemplos para Estoque
Criar um Estoque
GET /api.php?fn=createEstoque&status_estoque=Disponível&id_livro=1

Ler todos os Estoques
GET /api.php?fn=getAllEstoques

Ler um Estoque por ID
GET /api.php?fn=getEstoqueById&id=1

Atualizar um Estoque
GET /api.php?fn=updateEstoque&id=1&status_estoque=Indisponível&id_livro=1

Excluir um Estoque
GET /api.php?fn=deleteEstoque&id=1