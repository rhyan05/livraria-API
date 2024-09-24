<?php
require_once 'db.php';

// Classes para Editora e Autor
class Editora {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos CRUD para Editora
    public function getEditoras() {
        $query = "SELECT * FROM Editora";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEditoraById($id_editora) {
        $query = "SELECT * FROM Editora WHERE id_editora = :id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_editora", $id_editora);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEditora($nome_editora, $status_editora) {
        $query = "INSERT INTO Editora (nome_editora, status_editora) VALUES (:nome_editora, :status_editora)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome_editora", $nome_editora);
        $stmt->bindParam(":status_editora", $status_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora criada com sucesso'];
        } else {
            return ['message' => 'Erro ao criar editora'];
        }
    }

    public function updateEditora($id_editora, $nome_editora, $status_editora) {
        $query = "UPDATE Editora SET nome_editora = :nome_editora, status_editora = :status_editora WHERE id_editora = :id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_editora", $id_editora);
        $stmt->bindParam(":nome_editora", $nome_editora);
        $stmt->bindParam(":status_editora", $status_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora atualizada com sucesso'];
        } else {
            return ['message' => 'Erro ao atualizar editora'];
        }
    }

    public function deleteEditora($id_editora) {
        $query = "DELETE FROM Editora WHERE id_editora = :id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_editora", $id_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora excluída com sucesso'];
        } else {
            return ['message' => 'Erro ao excluir editora'];
        }
    }
}

class Autor {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos CRUD para Autor
    public function getAutores() {
        $query = "SELECT * FROM Autor";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAutorById($id_autor) {
        $query = "SELECT * FROM Autor WHERE id_autor = :id_autor";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_autor", $id_autor);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAutor($nome_autor) {
        $query = "INSERT INTO Autor (nome_autor) VALUES (:nome_autor)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome_autor", $nome_autor);
        if ($stmt->execute()) {
            return ['message' => 'Autor criado com sucesso'];
        } else {
            return ['message' => 'Erro ao criar autor'];
        }
    }

    public function updateAutor($id_autor, $nome_autor) {
        $query = "UPDATE Autor SET nome_autor = :nome_autor WHERE id_autor = :id_autor";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_autor", $id_autor);
        $stmt->bindParam(":nome_autor", $nome_autor);
        if ($stmt->execute()) {
            return ['message' => 'Autor atualizado com sucesso'];
        } else {
            return ['message' => 'Erro ao atualizar autor'];
        }
    }

    public function deleteAutor($id_autor) {
        $query = "DELETE FROM Autor WHERE id_autor = :id_autor";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_autor", $id_autor);
        if ($stmt->execute()) {
            return ['message' => 'Autor excluído com sucesso'];
        } else {
            return ['message' => 'Erro ao excluir autor'];
        }
    }
}

class Livro {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos CRUD para Livro
    public function getLivros() {
        $query = "SELECT * FROM Livro";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLivroById($id_livro) {
        $query = "SELECT * FROM Livro WHERE id_livro = :id_livro";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_livro", $id_livro);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createLivro($nome_livro, $id_editora, $id_autor, $data_lancamento, $status_matricula) {
        $query = "INSERT INTO Livro (nome_livro, id_editora, id_autor, data_lancamento, status_matricula) VALUES (:nome_livro, :id_editora, :id_autor, :data_lancamento, :status_matricula)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome_livro", $nome_livro);
        $stmt->bindParam(":id_editora", $id_editora);
        $stmt->bindParam(":id_autor", $id_autor);
        $stmt->bindParam(":data_lancamento", $data_lancamento);
        $stmt->bindParam(":status_matricula", $status_matricula);
        if ($stmt->execute()) {
            return ['message' => 'Livro criado com sucesso'];
        } else {
            return ['message' => 'Erro ao criar livro'];
        }
    }

    public function updateLivro($id_livro, $nome_livro, $id_editora, $id_autor, $data_lancamento, $status_matricula) {
        $query = "UPDATE Livro SET nome_livro = :nome_livro, id_editora = :id_editora, id_autor = :id_autor, data_lancamento = :data_lancamento, status_matricula = :status_matricula WHERE id_livro = :id_livro";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_livro", $id_livro);
        $stmt->bindParam(":nome_livro", $nome_livro);
        $stmt->bindParam(":id_editora", $id_editora);
        $stmt->bindParam(":id_autor", $id_autor);
        $stmt->bindParam(":data_lancamento", $data_lancamento);
        $stmt->bindParam(":status_matricula", $status_matricula);
        if ($stmt->execute()) {
            return ['message' => 'Livro atualizado com sucesso'];
        } else {
            return ['message' => 'Erro ao atualizar livro'];
        }
    }

    public function deleteLivro($id_livro) {
        $query = "DELETE FROM Livro WHERE id_livro = :id_livro";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_livro", $id_livro);
        if ($stmt->execute()) {
            return ['message' => 'Livro excluído com sucesso'];
        } else {
            return ['message' => 'Erro ao excluir livro'];
        }
    }
}

class Estoque {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos CRUD para Estoque
    public function getEstoques() {
        $query = "SELECT * FROM Estoque";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEstoqueById($id_estoque) {
        $query = "SELECT * FROM Estoque WHERE id_estoque = :id_estoque";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_estoque", $id_estoque);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEstoque($status_estoque, $id_livro) {
        $query = "INSERT INTO Estoque (status_estoque, id_livro) VALUES (:status_estoque, :id_livro)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status_estoque", $status_estoque);
        $stmt->bindParam(":id_livro", $id_livro);
        if ($stmt->execute()) {
            return ['message' => 'Estoque criado com sucesso'];
        } else {
            return ['message' => 'Erro ao criar estoque'];
        }
    }

    public function updateEstoque($id_estoque, $status_estoque, $id_livro) {
        $query = "UPDATE Estoque SET status_estoque = :status_estoque, id_livro = :id_livro WHERE id_estoque = :id_estoque";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_estoque", $id_estoque);
        $stmt->bindParam(":status_estoque", $status_estoque);
        $stmt->bindParam(":id_livro", $id_livro);
        if ($stmt->execute()) {
            return ['message' => 'Estoque atualizado com sucesso'];
        } else {
            return ['message' => 'Erro ao atualizar estoque'];
        }
    }

    public function deleteEstoque($id_estoque) {
        $query = "DELETE FROM Estoque WHERE id_estoque = :id_estoque";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_estoque", $id_estoque);
        if ($stmt->execute()) {
            return ['message' => 'Estoque excluído com sucesso'];
        } else {
            return ['message' => 'Erro ao excluir estoque'];
        }
    }
}

// Lógica de roteamento via parâmetros da URL
if (isset($_GET['fn'])) {
    $fn = $_GET['fn'];
    $database = new Database();
    $db = $database->getConnection();

    // Verifica se é operação com Editora ou Autor ou Livro ou Estoque
    if (strpos($fn, 'editora') !== false) {
        $editora = new Editora($db);
        switch ($fn) {
            case 'getAllEditoras':
                echo json_encode($editora->getEditoras());
                break;
            case 'getEditoraById':
                if (isset($_GET['id'])) {
                    echo json_encode($editora->getEditoraById($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID da editora é necessário']);
                }
                break;
            case 'createEditora':
                if (isset($_GET['nome_editora']) && isset($_GET['status_editora'])) {
                    echo json_encode($editora->createEditora($_GET['nome_editora'], $_GET['status_editora']));
                } else {
                    echo json_encode(['message' => 'Parâmetros "nome_editora" e "status_editora" são necessários']);
                }
                break;
            case 'updateEditora':
                if (isset($_GET['id']) && isset($_GET['nome_editora']) && isset($_GET['status_editora'])) {
                    echo json_encode($editora->updateEditora($_GET['id'], $_GET['nome_editora'], $_GET['status_editora']));
                } else {
                    echo json_encode(['message' => 'ID, nome_editora e status_editora são necessários para atualizar']);
                }
                break;
            case 'deleteEditora':
                if (isset($_GET['id'])) {
                    echo json_encode($editora->deleteEditora($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID da editora é necessário para excluir']);
                }
                break;
        }
    } elseif (strpos($fn, 'autor') !== false) {
        $autor = new Autor($db);
        switch ($fn) {
            case 'getAllAutores':
                echo json_encode($autor->getAutores());
                break;
            case 'getAutorById':
                if (isset($_GET['id'])) {
                    echo json_encode($autor->getAutorById($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do autor é necessário']);
                }
                break;
            case 'createAutor':
                if (isset($_GET['nome_autor'])) {
                    echo json_encode($autor->createAutor($_GET['nome_autor']));
                } else {
                    echo json_encode(['message' => 'Parâmetro "nome_autor" é necessário']);
                }
                break;
            case 'updateAutor':
                if (isset($_GET['id']) && isset($_GET['nome_autor'])) {
                    echo json_encode($autor->updateAutor($_GET['id'], $_GET['nome_autor']));
                } else {
                    echo json_encode(['message' => 'ID e nome_autor são necessários para atualizar']);
                }
                break;
            case 'deleteAutor':
                if (isset($_GET['id'])) {
                    echo json_encode($autor->deleteAutor($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do autor é necessário para excluir']);
                }
                break;
        }
    } elseif (strpos($fn, 'livro') !== false) {
        $livro = new Livro($db);
        switch ($fn) {
            case 'getAllLivros':
                echo json_encode($livro->getLivros());
                break;
            case 'getLivroById':
                if (isset($_GET['id'])) {
                    echo json_encode($livro->getLivroById($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do livro é necessário']);
                }
                break;
            case 'createLivro':
                if (isset($_GET['nome_livro']) && isset($_GET['id_editora']) && isset($_GET['id_autor']) && isset($_GET['data_lancamento']) && isset($_GET['status_matricula'])) {
                    echo json_encode($livro->createLivro($_GET['nome_livro'], $_GET['id_editora'], $_GET['id_autor'], $_GET['data_lancamento'], $_GET['status_matricula']));
                } else {
                    echo json_encode(['message' => 'Todos os parâmetros são necessários para criar um livro']);
                }
                break;
            case 'updateLivro':
                if (isset($_GET['id']) && isset($_GET['nome_livro']) && isset($_GET['id_editora']) && isset($_GET['id_autor']) && isset($_GET['data_lancamento']) && isset($_GET['status_matricula'])) {
                    echo json_encode($livro->updateLivro($_GET['id'], $_GET['nome_livro'], $_GET['id_editora'], $_GET['id_autor'], $_GET['data_lancamento'], $_GET['status_matricula']));
                } else {
                    echo json_encode(['message' => 'ID e todos os parâmetros do livro são necessários para atualizar']);
                }
                break;
            case 'deleteLivro':
                if (isset($_GET['id'])) {
                    echo json_encode($livro->deleteLivro($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do livro é necessário para excluir']);
                }
                break;
        }
    } elseif (strpos($fn, 'estoque') !== false) {
        $estoque = new Estoque($db);
        switch ($fn) {
            case 'getAllEstoques':
                echo json_encode($estoque->getEstoques());
                break;
            case 'getEstoqueById':
                if (isset($_GET['id'])) {
                    echo json_encode($estoque->getEstoqueById($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do estoque é necessário']);
                }
                break;
            case 'createEstoque':
                if (isset($_GET['status_estoque']) && isset($_GET['id_livro'])) {
                    echo json_encode($estoque->createEstoque($_GET['status_estoque'], $_GET['id_livro']));
                } else {
                    echo json_encode(['message' => 'Parâmetros "status_estoque" e "id_livro" são necessários']);
                }
                break;
            case 'updateEstoque':
                if (isset($_GET['id']) && isset($_GET['status_estoque']) && isset($_GET['id_livro'])) {
                    echo json_encode($estoque->updateEstoque($_GET['id'], $_GET['status_estoque'], $_GET['id_livro']));
                } else {
                    echo json_encode(['message' => 'ID, status_estoque e id_livro são necessários para atualizar']);
                }
                break;
            case 'deleteEstoque':
                if (isset($_GET['id'])) {
                    echo json_encode($estoque->deleteEstoque($_GET['id']));
                } else {
                    echo json_encode(['message' => 'ID do estoque é necessário para excluir']);
                }
                break;
        }
    } else {
        echo json_encode(['message' => 'Função inválida']);
    }
} else {
    echo json_encode(['message' => 'Nenhuma função especificada']);
}
?>
