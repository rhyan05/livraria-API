<?php
class Autor {
    private $id;
    private $nome;

    
    public function setID($id) {
        $this->id = $id;
    }

    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // criar novo autor
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

    // ler autor
    public function readByID() {
        include 'db.php'; 

        $query = "SELECT * FROM autor WHERE id_autor = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result; // retorna o autor encontrado
        } else {
            return ["error" => "Autor não encontrado."]; // retorna mensagem de erro
        }
    }

    // Método para ler todos os autores
    public function read() {
        include 'db.php';

        $query = "SELECT * FROM autor";
        $stmt = $pdo->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // atualizar autor
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

    // deletar
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
