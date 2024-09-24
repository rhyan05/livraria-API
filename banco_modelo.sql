-- Tabela de Editora
CREATE TABLE Editora (
    id_editora INT PRIMARY KEY,
    nome_editora VARCHAR(255) NOT NULL,
    status_editora VARCHAR(50)
);

-- Tabela de Autor
CREATE TABLE Autor (
    id_autor INT PRIMARY KEY,
    nome_autor VARCHAR(255) NOT NULL
);

-- Tabela de Livro
CREATE TABLE Livro (
    id_livro INT PRIMARY KEY,
    nome_livro VARCHAR(255) NOT NULL,
    id_editora INT,
    id_autor INT,
    data_lancamento DATE,
    status_matricula VARCHAR(50),
    FOREIGN KEY (id_editora) REFERENCES Editora(id_editora),
    FOREIGN KEY (id_autor) REFERENCES Autor(id_autor)
);

-- Tabela de Estoque
CREATE TABLE Estoque (
    id_estoque INT PRIMARY KEY,
    status_estoque VARCHAR(50) NOT NULL,
    id_livro INT,
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro)
);

-- Tabela de Livraria
CREATE TABLE Livraria (
    id_livraria INT PRIMARY KEY,
    id_estoque INT,
    id_livro INT,
    FOREIGN KEY (id_estoque) REFERENCES Estoque(id_estoque),
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro)
);
