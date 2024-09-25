<?php
class Autor {
    private $id;
    private $nome;

    // Setter para ID
    public function setID($id) {
        $this->id = $id;
    }

    // Setter para Nome
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Método para criar um novo autor
    public function create() {
        include 'db.php'; 

        $query = "INSERT INTO autor (nome_autor) VALUES (:nome)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $this->nome);

        if ($stmt->execute()) {
            return ["message" => "Autor criado com sucesso!"];
        } else {
            return ["error" => "Erro ao criar autor."];
        }
    }

    // Método para ler um autor pelo ID
    public function readByID() {
        include 'db.php'; 

        $query = "SELECT * FROM autor WHERE id_autor = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result; // Retorna o autor encontrado
        } else {
            return ["error" => "Autor não encontrado."]; // Retorna mensagem de erro
        }
    }

    // Método para ler todos os autores
    public function read() {
        include 'db.php';

        $query = "SELECT * FROM autor";
        $stmt = $pdo->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um autor existente
    public function update() {
        include 'db.php';

        $query = "UPDATE autor SET nome_autor = :nome WHERE id_autor = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return ["message" => "Autor atualizado com sucesso!"];
        } else {
            return ["error" => "Erro ao atualizar autor."];
        }
    }

    // Método para deletar um autor
    public function delete() {
        include 'db.php'; 

        $query = "DELETE FROM autor WHERE id_autor = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return ["message" => "Autor deletado com sucesso!"];
        } else {
            return ["error" => "Erro ao deletar autor."];
        }
    }
}
?>
